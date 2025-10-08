<?php
session_start();

$fn = __DIR__ . '/users.txt';
$message = '';

// Registrierung
if (isset($_POST['action']) && $_POST['action'] === 'register') {
    $user = trim($_POST['username'] ?? '');
    $pass = trim($_POST['password'] ?? '');
    if ($user === '' || $pass === '') {
        $message = 'Benutzername und Passwort dürfen nicht leer sein.';
    } else {
        // Speichern im Format username:password
        file_put_contents($fn, $user . ':' . $pass . PHP_EOL, FILE_APPEND | LOCK_EX);
        $message = 'Registrierung erfolgreich.';
    }
}

// Login
if (isset($_POST['action']) && $_POST['action'] === 'login') {
    $user = trim($_POST['username'] ?? '');
    $pass = trim($_POST['password'] ?? '');
    $ok = false;
    if ($user !== '' && $pass !== '' && file_exists($fn)) {
        $lines = file($fn, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $l) {
            list($u, $p) = explode(':', $l, 2) + [null, null];
            if ($u === $user && $p === $pass) {
                $ok = true;
                break;
            }
        }
    }
    if ($ok) {
        $_SESSION['user'] = $user;
        $message = 'Login erfolgreich.';
        // Redirect to avoid Formular-Resubmit
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $message = 'Login fehlgeschlagen.';
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Auth - Demo</title>
</head>

<body>
    <h1>Auth</h1>
    <?php if ($message): ?>
        <p><strong><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></strong></p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['user'])): ?>
        <p>Angemeldet als: <strong><?= htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8') ?></strong>
            — <a href="?logout=1">Logout</a></p>
    <?php else: ?>

        <h2>Registrieren</h2>
        <form method="post" action="">
            <input name="username" placeholder="Benutzername"><br>
            <input name="password" type="password" placeholder="Passwort"><br>
            <input type="hidden" name="action" value="register">
            <button type="submit">Registrieren</button>
        </form>

        <hr>

        <h2>Login</h2>
        <form method="post" action="">
            <input name="username" placeholder="Benutzername"><br>
            <input name="password" type="password" placeholder="Passwort"><br>
            <input type="hidden" name="action" value="login">
            <button type="submit">Login</button>
        </form>
        <hr>

    <?php endif; ?>

</body>

</html>