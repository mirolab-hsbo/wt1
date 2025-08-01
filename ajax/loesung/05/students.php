<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>WT1-Übung Ajax</title>
</head>

<body>
    Suche: <input type="search" id="search"><br /><br />

    <table>
        <thead>
            <tr>
                <th>Matrikelnummer</th>
                <th>Name</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody id="table-content">
        </tbody>
    </table>

    Matrikelnummer: <input type="text" name="matrnr"><br />
    Name: <input type="text" name="name"><br />
    Semester: <input type="text" name="semester"><br />
    <button id="submit-form">Hinzufügen</button>

    <script type="text/javascript">
        let tableBody = document.getElementById("table-content");
        let addButton = document.getElementById("submit-form");
        // Indizes angepasst (wg. neuem Inputfeld)
        let matrnrInput = document.getElementsByTagName("input")[1];
        let nameInput = document.getElementsByTagName("input")[2];
        let semesterInput = document.getElementsByTagName("input")[3];
        // neu
        let searchInput = document.getElementById("search");

        function renderData(students) {
            let output = ""
            for (let i = 0; i < students.length; i++) {
                output += "<tr>"
                output += "<td>" + students[i].matrnr + "</td>"
                output += "<td>" + students[i].name + "</td>"
                output += "<td>" + students[i].semester + "</td>"
                output += "</tr>"
            }
            tableBody.innerHTML = output
        }

        function fetchData() {
            fetch("api.php").then(function(res) {
                return res.json()
            }).then(function(res) {
                renderData(res.students)
            })
        }

        fetchData()

        addButton.addEventListener("click", function() {
            let data = new FormData();
            data.append("matrnr", matrnrInput.value);
            data.append("name", nameInput.value);
            data.append("semester", semesterInput.value);
            fetch("add_student.php", {
                method: "POST",
                body: data
            }).then(function(res) {
                return res.json()
            }).then(function(res) {
                if (res.result == "1") {
                    fetchData()
                } else {
                    alert("Beim Hinzufügen der Daten ist ein Fehler aufgetreten!")
                }
            })
        })

        searchInput.addEventListener("input", function(){
            let searchValue = searchInput.value
            if(searchValue == ""){
                fetchData()
                return
            }
            let data = new FormData();
            data.append("suchbegriff", searchValue)
            fetch("api.php", {
                method: "POST",
                body: data
            }).then(function(res) {
                return res.json()
            }).then(function(res) {
                renderData(res.students)
            })
        })
    </script>
</body>

</html>