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

    <form action="add_student.php" method="POST">
        Matrikelnummer: <input type="text" name="matrnr"><br />
        Name: <input type="text" name="name"><br />
        Semester: <input type="text" name="semester"><br />
        <button type="submit">Hinzufügen</button>
    </form>

    <script type="text/javascript">
        let tableBody = document.getElementById("table-content");

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
    </script>
</body>

</html>