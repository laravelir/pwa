const staticCacheName = "site-static-v1";
const cacheAssets = [
    "/",
    "/index.html",
    "/css/materialize.min.css",
    "/css/style.css",
    "/js/app.js",
    "/js/ui.js",
    "/js/materialize.min.js",
    "/img/dish.png",
    "./pages/fallback.html"
];

self.addEventListener("install", evt => {
    evt.waitUntil(
        caches
            .open(staticCacheName)
            .then(cache => {
                console.log("caching assets...");
                cache.addAll(cacheAssets);
            })
            .catch(err => {})
    );
});

self.addEventListener("fetch", evt => {
    evt.respondWith(
        caches
            .match(evt.request)
            .then(res => {
                return res || fetch(evt.request);
            })
            .catch(err => {
                if (evt.request.url.indexOf(".html") > -1) {
                    return caches.match("./pages/fallback.html");
                }
            })
    );
});
