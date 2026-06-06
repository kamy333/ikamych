const CACHE_NAME = 'ikamy-pwa-v1';
const OFFLINE_URL = '/public/offline.html';

const PRECACHE_URLS = [
  OFFLINE_URL,
  '/favicon.ico',
  '/public/manifest.webmanifest',
  '/public/favicon-16x16.png',
  '/public/favicon-32x32.png',
  '/public/apple-touch-icon.png',
  '/public/favicon.png',
  '/public/pwa-icon-192.png',
  '/public/css/bootstrap.min.css',
  '/public/css/custom.css',
  '/public/css/styles.css'
];

function isCacheableStaticAsset(url) {
  const pathname = url.pathname;

  if (pathname === '/favicon.ico') {
    return true;
  }

  if (/^\/public\/(?:favicon|apple-touch-icon|pwa-icon)-.*\.png$/.test(pathname)) {
    return true;
  }

  return /^\/public\/(?:css|js|myjs|font-awesome)\//.test(pathname) &&
    /\.(?:css|js|png|jpg|jpeg|gif|svg|webp|ico|woff2?|ttf|eot)$/i.test(pathname);
}

async function cacheFirst(request) {
  const cachedResponse = await caches.match(request);

  if (cachedResponse) {
    return cachedResponse;
  }

  const networkResponse = await fetch(request);

  if (networkResponse.ok && networkResponse.type === 'basic') {
    const responseToCache = networkResponse.clone();
    const cache = await caches.open(CACHE_NAME);
    await cache.put(request, responseToCache);
  }

  return networkResponse;
}

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => cache.addAll(PRECACHE_URLS))
      .then(() => self.skipWaiting())
  );
});

self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys()
      .then((cacheNames) => Promise.all(
        cacheNames
          .filter((cacheName) => cacheName !== CACHE_NAME)
          .map((cacheName) => caches.delete(cacheName))
      ))
      .then(() => self.clients.claim())
  );
});

self.addEventListener('fetch', (event) => {
  const request = event.request;

  if (request.method !== 'GET') {
    return;
  }

  const url = new URL(request.url);

  if (url.origin !== self.location.origin) {
    return;
  }

  if (request.mode === 'navigate') {
    event.respondWith(
      fetch(request).catch(() => caches.match(OFFLINE_URL))
    );
    return;
  }

  if (isCacheableStaticAsset(url)) {
    event.respondWith(cacheFirst(request));
  }
});
