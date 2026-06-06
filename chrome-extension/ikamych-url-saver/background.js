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

chrome.contextMenus.onClicked.addListener((info, tab) => {
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
    saveLink({
      url: tab && tab.url ? tab.url : "",
      title: tab && tab.title ? tab.title : "",
      note: info.selectionText ? truncate(info.selectionText, 1000) : "",
      tab
    });
  }
});

async function savePageFromTab(tab) {
  await saveLink({
    url: tab && tab.url ? tab.url : "",
    title: tab && tab.title ? tab.title : "",
    note: "",
    tab
  });
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
        note: truncate(payload.note || "", 4000)
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
