<?php
session_start();
if (!isset($_SESSION["username"])) {
    $_SESSION["username"] = "Alice";
}
// NEU: Erzeugung und Speicherung des CSRF-Tokens in der PHP-Session
if (!isset($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(16));
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // NEU: Vor dem Ändern des Benutzernamens wird der CSRF-Token gegen jenen in der Session gegengeprüft
    // Falls diese nicht übereinstimmen, wird ein Fehler ausgegeben und keine Änderung vorgenommen.
    if (hash_equals($_SESSION["csrf_token"], $_POST["token"] ?? '')) {
        $_SESSION["username"] = $_POST["newname"];
        echo "<p style='color:green;'>Name erfolgreich geändert!</p>";
    } else {
        echo "<p style='color:red;'>CSRF-Token ungültig!</p>";
    }
}
?>
<h2>Profilseite</h2>
<p>Angemeldeter Benutzer: <?= htmlspecialchars($_SESSION["username"]) ?></p>

<form method="POST" action="opfer_secure.php">
    <input type="text" name="newname" placeholder="Neuer Name">
    <!-- NEU: CSRF-Token wird dem Formular als verstecktes Eingabefeld hinzugefügt -->
    <input type="hidden" name="token" value="<?= $_SESSION["csrf_token"] ?>">
    <button type="submit">Ändern</button>
</form>