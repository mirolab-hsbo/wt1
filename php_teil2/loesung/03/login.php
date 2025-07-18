<?php

session_start();

$user = $_POST["user"];
$pw = $_POST["pw"];

$error_msg = "Benutzername oder Passwort falsch!";

if ($user == "willi") {
    if ($pw == "12345") {
        echo "<p>Login erfolgreich!</p>";
        $_SESSION['logged_in'] = 1;
    } else {
        echo $error_msg;
    }
} else {
    echo $error_msg;
}
