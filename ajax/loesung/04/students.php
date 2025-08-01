<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>WT1-Übung Ajax</title>
</head>

<body>
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
        // neu
        let addButton = document.getElementById("submit-form");
        let matrnrInput = document.getElementsByTagName("input")[0];
        let nameInput = document.getElementsByTagName("input")[1];
        let semesterInput = document.getElementsByTagName("input")[2];

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

        // neu
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
    </script>
</body>

</html>