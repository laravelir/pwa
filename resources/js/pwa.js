// 'use strict';
if ("serviceWorker" in navigator) {
    navigator.serviceWorker
        .register("sw.js")
        .then(reg => {
            console.log("PWA Package: Service worker registered successfully", reg);
        })
        .catch(err => {
            console.log("PWA Package: Service worker not registered !!", err);
        });
}


