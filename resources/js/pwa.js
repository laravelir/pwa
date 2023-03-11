// 'use strict';

window.addEventListener('load', function () {
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker
            .register("sw.js")
            .then(reg => {
                console.log("PWA Package: Service worker registered successfully with scope: ", reg.scope);
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
        if (installPromptEvent) {
            installPromptEvent.prompt();
            installPromptEvent.userChoice
                .then((choice) => {
                    if (choice.outcome === 'accepted') {

                    } else {

                    }

                    installPromptEvent = null;
                });
        }
    });


    const getNotificationPermission = async () => {
        if (navigator.permissions) {
            let result = await navigator.permissions
                .query({name: 'notifications'});
            return result.state;

        }
    };

   // let currentNotificationPermissionState = await getNotificationPermission();

    notificationBtn.addEventListener('click', async (event) => {
        event.preventDefault();

        if (!('serviceWorker' in navigator) && !('PushManager' in window)) {
            console.log('not support')
            return;
        }

        if (currentNotificationPermissionState !== 'granted') {
            let res = await Notification.requestPermission();
            if (res !== 'granted') {
                console.log('permission no granted')
                return;
            }
        } else {
            navigator.serviceWorker.ready.then(registration => {
                registration.showNotification('اعلان', {
                    body: 'ـوضیحات',
                    dir: 'rtl',
                    icon: 'icons.png',
                    badge: 'icon.ico',
                    renotify: true,
                    actions: [
                        {
                            title: '',
                            action: ''
                        },
                    ]
                })
            })
        }
    });

});

