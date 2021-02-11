
//If the service worker was successfully installed, the install event will fire
//and inside the event handler you should cache your static assets.
//Caching is done using the CacheStorage object, which lives in window.caches.

const cacheName = 'site-cache';
const filesToCache = [
  '/',
  '/index.html',
  '/custom/css/style.min.css',
  '/custom/js/main.js',
  '/img/73.jpg',
  '/post/index.html'
];

self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(cacheName)
    .then(cache => {
      try{ cache.addAll(filesToCache); }
      catch(err){ console.warn('error while caching files '+ cacheName,  err); }
    })
  );
});


//When installing the (new) service worker was successfull, the activate event will be fired.
//The service worker is now ready to control your website, but it won’t control it yet.
//Only when you refresh the page after the service worker was activated will it control your website.
//
//The window(s) of a website that a service worker controls are called its clients.
//Inside the event handler for the install event it is possible to take control of uncontrolled
//clients by calling self.clients.claim(). The service worker will then control the website immediately
self.addEventListener('activate', e => self.clients.claim());



//Whenever a request is made from the website that the service worker controls a fetch event is fired.
//The request property of the FetchEvent gives access to the request that was made.
//Inside the event handler we can serve the static assets we added to the cache earlier
//in the handler for the install event:
self.addEventListener('fetch', e => {
  e.respondWith(
    caches.match(e.request)
    .then(response => response ? response : fetch(e.request))
  )
});
