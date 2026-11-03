# Ikamych URL Saver

Private Chrome extension for saving the current page or a right-clicked link to Ikamych.

When saving the current page, the extension also saves the page's public title and description when available. Selected text from the context menu takes priority over the description. Some sites, especially Facebook, may not expose readable metadata; the title and note can still be edited on the Saved links page.

For an open Facebook Reel, the extension reads the visible video's poster and short caption. Ikamych stores Facebook poster images on its own server so signed Facebook image URLs can expire without breaking the gallery. Other sites use their Open Graph image when available. Existing saved links gain a preview when you open them and save them again with the extension.

## Install locally

1. Open `chrome://extensions`.
2. Enable Developer mode.
3. Click Load unpacked.
4. Select this folder: `chrome-extension/ikamych-url-saver`.
5. Open the extension options.
6. Paste a token generated from `/public/saved_links.php`.

## Default endpoints

- API: `https://www.ikamy.ch/public/api/v1/saved-links.php`
- Saved links page: `https://www.ikamy.ch/public/saved_links.php`

For local testing, use:

- API: `http://ikamy.local/public/api/v1/saved-links.php`
- Saved links page: `http://ikamy.local/public/saved_links.php`
