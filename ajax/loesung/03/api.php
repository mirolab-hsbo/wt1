<?php

header("Content-Type: application/json; charset=utf-8");

$jsonString = file_get_contents("students.json");
echo $jsonString;
