
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
        fetch('http://127.0.0.1/news.php')
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

    deleteButton.addEventListener('click', deleteLocalData);

    // neu
    loadFromLocalStorage();

    // neu
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js')
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
