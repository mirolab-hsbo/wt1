<?php
$filename = __DIR__ . '/messages.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? 'Gast';
    $msg  = $_POST['message'] ?? '';
    file_put_contents($filename, $name . "|" . $msg . PHP_EOL, FILE_APPEND | LOCK_EX);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Lade Nachrichten
$lines = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Gästebuch</title>
</head>

<body>
    <h1>Gästebuch</h1>

    <form method="post" action="guestbook_secure.php">
        <input name="name" placeholder="Name"><br>
        <textarea name="message" placeholder="Nachricht"></textarea><br>
        <button>Senden</button>
    </form>

    <h2>Nachrichten</h2>
    <?php foreach ($lines as $line):
        list($n, $m) = explode('|', $line, 2); ?>
        <!-- NEU: Hier findet jetzt das Escaping statt. -->
        <div class="entry">
            <strong><?= htmlspecialchars($n, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></strong>:
            <?= nl2br(htmlspecialchars($m, ENT_QUOTES | ENT_HTML5, 'UTF-8')) ?>
        </div>
    <?php endforeach; ?>
</body>

</html>