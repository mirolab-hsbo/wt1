
document.addEventListener('DOMContentLoaded', function () {
    const deleteButton = document.getElementById('delete-button');
    const dataList = document.getElementById('data-list');
    let newsData = []

    function renderData(item) {
        const li = document.createElement('li');
        li.innerHTML = `<small>${item.date}</small><p>${item.title}</p>`;
        dataList.prepend(li);
    }

    function syncData() {
        fetch('https://10.102.10.17/news.php')
            .then(function (response) { return response.json() })
            .then(function (data) {
                newsData.push(data)
                // ergänzt:
                localStorage.setItem('syncData', JSON.stringify(newsData));
                renderData(data);
            })
            .catch(function (error) {
                console.error('Fehler beim Synchronisieren:', error);
            });
    }

    function deleteLocalData() {
        // ergänzt:
        localStorage.removeItem('syncData');
        dataList.innerHTML = ''
    }

    // neu
    function loadFromLocalStorage() {
        const stored = localStorage.getItem('syncData');
        if (stored) {
            newsData = JSON.parse(stored);
            newsData.forEach(function (item) {
                renderData(item)
            })
        }
    }

    // entfernt (zu Service Worker verschoben)
    /*
    function checkForUpdate() {
        fetch("https://10.102.12.79/update.php")
            .then(function (response) { return response.json() })
            .then(function (data) {
                if (data.update_available) {
                    syncData()
                }
            })
            .catch(function (err) { console.error('Service Worker Fetch Error:', err) });
    }

    function checkForUpdate() {
        const randomDelay = Math.floor(Math.random() * (10 - 5 + 1) + 2) * 1000; // 5–10 Sekunden
        setTimeout(function () {
            fetchAndSendNewEntry();
            scheduleRandomSync();
        }, randomDelay);
    }
    */

    deleteButton.addEventListener('click', deleteLocalData);

    // neu
    loadFromLocalStorage();
    // wird nicht mehr benötigt
    //scheduleRandomSync();

    // neu
    if ('serviceWorker' in navigator) {
        // BEACHTEN: "spectacular-streamer" muss durch den eigenen Benutzernamen ersetzt werden!
        navigator.serviceWorker.register('/spectacular-streamer/service-worker.js')
            .then(function () { console.log('Service Worker registriert') })
            .catch(function (err) { console.error('Service Worker Fehler:', err) });


        navigator.serviceWorker.ready.then(function (registration) {
            registration.active.postMessage({myvariable: "Hello"});
        });

        navigator.serviceWorker.addEventListener('message', function (event) {
            if (event.data?.myvariable) {
                console.log("Vom Service Worker erhalten: " + event.data.myvariable);
            }
            if (event.data?.type === 'new-entry') {
                syncData();
            }
        });

    }

});
