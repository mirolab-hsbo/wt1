<?php

$jsonString = file_get_contents("students.json");
$values = json_decode($jsonString, true);
$students = $values["students"];
array_push($students, ["matrnr" => $_POST["matrnr"], "name" => $_POST["name"], "semester" => $_POST["semester"]]);
$values["students"] = $students;
$jsonString = json_encode($values);
file_put_contents("students.json", $jsonString);
?>

<p>Hinzufügen erfolgreich!</p>