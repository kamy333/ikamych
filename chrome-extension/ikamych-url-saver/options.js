const DEFAULT_SETTINGS = {
  apiEndpoint: "https://www.ikamy.ch/public/api/v1/saved-links.php",
  savedLinksUrl: "https://www.ikamy.ch/public/saved_links.php",
  token: ""
};

const form = document.getElementById("options-form");
const apiEndpoint = document.getElementById("api-endpoint");
const savedLinksUrl = document.getElementById("saved-links-url");
const token = document.getElementById("token");
const statusMessage = document.getElementById("status");
const testButton = document.getElementById("test-connection");
const openSavedLinks = document.getElementById("open-saved-links");

loadSettings();

form.addEventListener("submit", async (event) => {
  event.preventDefault();

  await chrome.storage.sync.set({
    apiEndpoint: apiEndpoint.value.trim(),
    savedLinksUrl: savedLinksUrl.value.trim(),
    token: token.value.trim()
  });

  openSavedLinks.href = savedLinksUrl.value.trim();
  showStatus("Settings saved.", true);
});

testButton.addEventListener("click", async () => {
  const settings = {
    apiEndpoint: apiEndpoint.value.trim(),
    token: token.value.trim()
  };

  if (!settings.apiEndpoint || !settings.token) {
    showStatus("API endpoint and token are required.", false);
    return;
  }

  try {
    const url = new URL(settings.apiEndpoint);
    url.searchParams.set("limit", "1");

    const response = await fetch(url.href, {
      method: "GET",
      headers: {
        "Authorization": `Bearer ${settings.token}`
      }
    });

    const data = await response.json().catch(() => ({}));

    if (!response.ok) {
      throw new Error(data.error || `HTTP ${response.status}`);
    }

    showStatus("Connection works.", true);
  } catch (error) {
    showStatus(error.message || "Connection failed.", false);
  }
});

async function loadSettings() {
  const settings = await chrome.storage.sync.get(DEFAULT_SETTINGS);

  apiEndpoint.value = settings.apiEndpoint || DEFAULT_SETTINGS.apiEndpoint;
  savedLinksUrl.value = settings.savedLinksUrl || DEFAULT_SETTINGS.savedLinksUrl;
  token.value = settings.token || "";
  openSavedLinks.href = savedLinksUrl.value;
}

function showStatus(message, ok) {
  statusMessage.textContent = message;
  statusMessage.className = ok ? "status status--ok" : "status status--error";
}
