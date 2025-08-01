<?php

header("Content-Type: application/json; charset=utf-8");

$jsonString = file_get_contents("students.json");
$data = json_decode($jsonString, true);
$students = $data["students"];
$students_filtered = [];
foreach ($students as $student) {
    if (!empty($_POST["suchbegriff"])) {
        if (str_contains($student["name"], $_POST["suchbegriff"])) {
            $students_filtered[] = $student;
        }
    } else {
        $students_filtered[] = $student;
    }
}
echo json_encode(["students" => $students_filtered]);
