const cacheVersion = 1 + new Date().getTime();

const currentCacheName = {
    static: "static-cache-v" + cacheVersion,
    dynamic: "dynamic-cache-v" + cacheVersion
};

const assetsToCache = [
    "/",
    "/index.html",
    "/css/materialize.min.css",
    "/css/style.css",
    "/js/app.js",
    "/js/ui.js",
    "/js/materialize.min.js",
    "/img/dish.png",
    "./offline.html"
];

// Cache assets on install
self.addEventListener("install", evt => {
    evt.waitUntil(
        caches
            .open(currentCacheName['static'])
            .then(cache => {
                console.log("caching assets...");
                return cache.addAll(assetsToCache);
            })
            .catch(err => {
                console.error("error in caching assets: ", err)
            })
    );
});


self.addEventListener('activate', evt => {
    let expectedName = Object.values(staticCacheName);
    evt.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.forEach(cacheName => {
                    if (!expectedName.includes(cacheName)) {
                        return caches.delete(cacheName)
                    }
                })
            )
        })
    )
});

self.addEventListener("fetch", evt => {
    let urls = [
        'test.com/api',
        'test.com/blog'
    ]
    if (urls.indexOf(evt.request.url) > -1) {
        return evt.respondWith(
            fetch(evt.request).then(response => {
                return caches.open(currentCacheName['dynamic']).then(cache => {
                    cache.put(evt.request, response.clone());
                    return response;
                }).catch(err => {
                    return caches.match(evt.request);
                })
            })
        );
    } else {
        return evt.respondWith(
            caches.match(evt.request).then(response => {
                if (response) return response;

                return fetch(evt.request).then(networkResponse => {
                    return caches.open(currentCacheName['dynamic']).then(cache => {
                        cache.put(evt.request, networkResponse.clone());
                        return networkResponse;
                    }).catch(err => {
                        return caches.open(currentCacheName['static']).then(cache => {
                            return cache.match("/offline.html");
                        })
                    })
                })
            })
        );

    }


});

// first network second cache
// self.addEventListener("fetch", evt => {
//     return evt.respondWith(
//         fetch(evt.request).then(response => {
//             return caches.open(currentCacheName['dynamic']).then(cache => {
//                 cache.put(evt.request, response.clone());
//                 return response;
//             }).catch(err => {
//                 return caches.match(evt.request);
//             })
//         })
//     );
// });

// self.addEventListener("fetch", evt => {
//     evt.respondWith(
//         caches.match(evt.request).then(response => {
//             if(response) return response;
//
//             return fetch(evt.request).then(networkResponse => {
//                 caches.open(currentCacheName['dynamic']).then(cache=>{
//                     cache.put(evt.request, networkResponse.clone());
//                     return networkResponse;
//                 })
//             })
//         })
//     );
// });

// self.addEventListener("fetch", evt => {
//     evt.respondWith(
//         caches.open(currentCacheName['static']).then((cache) => {
//             cache.match(evt.request)
//                 .then(res => {
//                     return res || fetch(evt.request);
//                 })
//         })
//             .catch(err => {
//                 if (evt.request.url.indexOf(".html") > -1) {
//                     return caches.match("./pages/fallback.html");
//                 }
//             })
//     );
// });
//

self.addEventListener('notificationclick', (event) => {
    let notification = event.notification;
    let action = event.action;

    notification.close();

    switch (action) {
        case 'click-action':
            promiseChain = clients.openWindow('/test.html')
            break;
    }

    event.waitUntil(promiseChain);
});
