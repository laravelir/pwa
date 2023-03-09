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
} else {
    console.log("PWA Package: Service worker not support !!");
}

let installPromptEvent;
window.addEventListener('beforeinstallprompt', event => {
    e.preventDefault();
    installPromptEvent = event;
});

document.querySelector('.btn_show_banner').addEventListener('click', (e) => {
    e.preventDefault();
    if(installPromptEvent) {
        installPromptEvent.prompt();
        installPromptEvent.userChoice
            .then((choice) => {
                if(choice.outcome === 'accepted') {

                } else {

                }

                installPromptEvent = null;
            });
    }
});

