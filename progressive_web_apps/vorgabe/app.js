
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
        fetch('https://wt1.mirolab.hs-bochum.de/news.php')
            .then(function (response) { return response.json() })
            .then(function (data) {
                newsData.push(data)
                renderData(data);
            })
            .catch(function (error) {
                console.error('Fehler beim Synchronisieren:', error);
            });
    }

    function deleteLocalData() {
        dataList.innerHTML = ''
    }

    function checkForUpdate() {
        fetch("https://wt1.mirolab.hs-bochum.de/update.php")
            .then(function (response) { return response.json() })
            .then(function (data) {
                if (data.update_available) {
                    syncData()
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

    deleteButton.addEventListener('click', deleteLocalData);

    scheduleRandomSync();


});
