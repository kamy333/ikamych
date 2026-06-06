# Ikamych URL Saver

Private Chrome extension for saving the current page or a right-clicked link to Ikamych.

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
