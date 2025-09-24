

function checkForUpdate() {
    fetch("https://10.102.10.17/update.php")
        .then(function (response) { return response.json() })
        .then(function (data) {
            if (data.update_available) {
                sendMessageToClients({ type: 'new-entry' });
            }
        })
        .catch(function (err) { console.error('Service Worker Fetch Error:', err) });
}

function scheduleRandomSync() {
    const randomDelay = Math.floor(Math.random() * (10 - 5 + 1) + 2) * 1000; // 5–10 Sekunden
    setTimeout(function () {
        checkForUpdate();
        scheduleRandomSync();
    }, randomDelay);
}

function sendMessageToClients(message) {
    self.clients.matchAll().then(function (clients) {
        clients.forEach(function (client) {
            client.postMessage(message);
        });
    });
}

self.addEventListener('install', function (event) {
    self.skipWaiting();
});

self.addEventListener('activate', function (event) {
    event.waitUntil(clients.claim());
    scheduleRandomSync();
});

self.addEventListener("message", function(event){
    if(event.data?.myvariable){
        sendMessageToClients({ myvariable: event.data.myvariable + " World!" });
    }
});
