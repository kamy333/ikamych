const DEFAULT_SETTINGS = {
  apiEndpoint: "https://www.ikamy.ch/public/api/v1/saved-links.php",
  savedLinksUrl: "https://www.ikamy.ch/public/saved_links.php",
  token: ""
};

chrome.runtime.onInstalled.addListener(async () => {
  const settings = await chrome.storage.sync.get(DEFAULT_SETTINGS);
  await chrome.storage.sync.set({
    apiEndpoint: settings.apiEndpoint || DEFAULT_SETTINGS.apiEndpoint,
    savedLinksUrl: settings.savedLinksUrl || DEFAULT_SETTINGS.savedLinksUrl,
    token: settings.token || ""
  });

  chrome.contextMenus.removeAll(() => {
    chrome.contextMenus.create({
      id: "save-page",
      title: "Save page to Ikamych",
      contexts: ["page", "selection"]
    });

    chrome.contextMenus.create({
      id: "save-link",
      title: "Save link to Ikamych",
      contexts: ["link"]
    });
  });
});

chrome.action.onClicked.addListener((tab) => {
  savePageFromTab(tab);
});

chrome.contextMenus.onClicked.addListener(async (info, tab) => {
  if (info.menuItemId === "save-link" && info.linkUrl) {
    saveLink({
      url: info.linkUrl,
      title: info.selectionText || info.linkUrl,
      note: "",
      tab
    });
    return;
  }

  if (info.menuItemId === "save-page") {
    const metadata = await readPageMetadata(tab);
    saveLink({
      url: tab && tab.url ? tab.url : "",
      title: metadata.title || (tab && tab.title ? tab.title : ""),
      note: info.selectionText ? truncate(info.selectionText, 1000) : metadata.description,
      imageUrl: metadata.imageUrl,
      tab
    });
  }
});

async function savePageFromTab(tab) {
  const metadata = await readPageMetadata(tab);
  await saveLink({
    url: tab && tab.url ? tab.url : "",
    title: metadata.title || (tab && tab.title ? tab.title : ""),
    note: metadata.description,
    imageUrl: metadata.imageUrl,
    tab
  });
}

async function readPageMetadata(tab) {
  if (!tab || !tab.id || !normalizeHttpUrl(tab.url)) {
    return { title: "", description: "", imageUrl: "" };
  }

  try {
    const results = await chrome.scripting.executeScript({
      target: { tabId: tab.id },
      func: () => {
        const meta = (selector) => document.querySelector(selector)?.content?.trim() || "";
        const visibleVideo = [...document.querySelectorAll("video")].map((video) => {
          const rect = video.getBoundingClientRect();
          const width = Math.max(0, Math.min(rect.right, innerWidth) - Math.max(rect.left, 0));
          const height = Math.max(0, Math.min(rect.bottom, innerHeight) - Math.max(rect.top, 0));
          return { video, area: width * height };
        }).filter((item) => item.area > 30000).sort((a, b) => b.area - a.area)[0]?.video;

        const videoLines = (visibleVideo?.parentElement?.innerText || "").split(/\n+/).map((line) => line.trim()).filter((line) =>
          line && !/^(follow|see more|·|\.\.\.)$/i.test(line)
        );
        const videoText = videoLines.length > 1 ? videoLines.slice(1).join(" ") : (videoLines[0] || "");
        const meaningfulVideoText = /^following\b/i.test(videoText) ? "" : videoText.replace(/\s*See more$/i, "");
        const articleText = document.querySelector("article p, main p")?.innerText?.trim() || "";
        const isFacebook = /(^|\.)facebook\.com$/i.test(location.hostname);
        const metaImage = meta('meta[property="og:image"]') || meta('meta[name="twitter:image"]');
        const image = isFacebook && visibleVideo?.poster ? visibleVideo.poster : metaImage;
        let imageUrl = "";
        if (image) {
          try {
            const normalized = new URL(image, location.href);
            if (normalized.protocol === "https:") imageUrl = normalized.href;
          } catch (error) {}
        }
        if (!imageUrl && isFacebook && location.pathname.startsWith('/photo/')) {
          const visibleImage = [...document.images].map((element) => {
            const rect = element.getBoundingClientRect();
            const width = Math.max(0, Math.min(rect.right, innerWidth) - Math.max(rect.left, 0));
            const height = Math.max(0, Math.min(rect.bottom, innerHeight) - Math.max(rect.top, 0));
            return { element, area: width * height };
          }).filter((item) => item.area > 30000 && /\.fbcdn\.net\//i.test(item.element.currentSrc || item.element.src))
            .sort((a, b) => b.area - a.area)[0]?.element;
          imageUrl = visibleImage?.currentSrc || visibleImage?.src || "";
        }

        let title = meta('meta[property="og:title"]') || meta('meta[name="twitter:title"]') || document.title;
        if (isFacebook && /^(?:\(\d+\)\s*)?Facebook$/i.test(title) && meaningfulVideoText.length >= 20) {
          title = meaningfulVideoText.slice(0, 140);
        }
        const metaDescription = meta('meta[property="og:description"]') || meta('meta[name="description"]')
          || meta('meta[name="twitter:description"]');
        const description = isFacebook && meaningfulVideoText.length > metaDescription.length + 20
          ? meaningfulVideoText
          : (metaDescription || meaningfulVideoText || articleText);
        return {
          title,
          description,
          imageUrl
        };
      }
    });
    return results[0]?.result || { title: "", description: "", imageUrl: "" };
  } catch (error) {
    return { title: "", description: "", imageUrl: "" };
  }
}

async function saveLink(payload) {
  try {
    const settings = await chrome.storage.sync.get(DEFAULT_SETTINGS);

    if (!settings.token) {
      await showBadge("!", "#b42318", "Token missing. Open Ikamych URL Saver options.");
      chrome.runtime.openOptionsPage();
      return;
    }

    const url = normalizeHttpUrl(payload.url);
    if (!url) {
      await showBadge("NO", "#b42318", "Only http and https pages can be saved.");
      return;
    }

    const response = await fetch(settings.apiEndpoint, {
      method: "POST",
      headers: {
        "Authorization": `Bearer ${settings.token}`,
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        url,
        title: truncate(payload.title || url, 500),
        note: truncate(payload.note || "", 4000),
        image_url: truncate(payload.imageUrl || "", 2048)
      })
    });

    const data = await response.json().catch(() => ({}));

    if (!response.ok) {
      throw new Error(data.error || `Ikamych returned HTTP ${response.status}`);
    }

    await showBadge("OK", "#0f766e", "Saved to Ikamych.");
  } catch (error) {
    console.error("Ikamych URL Saver failed:", error);
    await showBadge("ERR", "#b42318", error.message || "Save failed.");
  }
}

function normalizeHttpUrl(value) {
  try {
    const url = new URL(String(value || ""));
    return url.protocol === "http:" || url.protocol === "https:" ? url.href : "";
  } catch (error) {
    return "";
  }
}

function truncate(value, length) {
  value = String(value || "");
  return value.length > length ? value.slice(0, length) : value;
}

async function showBadge(text, color, title) {
  await chrome.action.setBadgeBackgroundColor({ color });
  await chrome.action.setBadgeText({ text });
  await chrome.action.setTitle({ title });

  setTimeout(() => {
    chrome.action.setBadgeText({ text: "" });
    chrome.action.setTitle({ title: "Save to Ikamych" });
  }, 2600);
}
