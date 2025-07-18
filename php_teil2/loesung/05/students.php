<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WT1-Übung PHP Teil 2</title>
</head>
<body>
    <?php 
        $jsonString = file_get_contents("students.json");
        $values = json_decode($jsonString, true);
        $students = $values["students"];
    ?>
    <table>
        <thead>
            <tr>
                <th>Matrikelnummer</th>
                <th>Name</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($students as $student){
                    ?>
                    <tr>
                        <td>
                            <?php echo $student["matrnr"]; ?>
                        </td>
                        <td>
                            <?php echo $student["name"]; ?>
                        </td>
                        <td>
                            <?php echo $student["semester"]; ?>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>