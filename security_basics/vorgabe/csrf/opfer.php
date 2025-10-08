<?php
session_start();
if (!isset($_SESSION["username"])) {
    $_SESSION["username"] = "Alice";
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["username"] = $_POST["newname"];
}
?>
<h2>Profilseite</h2>
<p>Angemeldeter Benutzer: <?= htmlspecialchars($_SESSION["username"]) ?></p>

<form method="POST" action="opfer.php">
    <input type="text" name="newname" placeholder="Neuer Name">
    <button type="submit">Ändern</button>
</form>