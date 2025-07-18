<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>WT1-Übung PHP Teil 2</title>
</head>
<body>
    <?php if(empty($_SESSION["logged_in"])){ ?>
    <form action="login.php" method="POST">
        Benutzername: <input type="text" name="user"><br />
        Passwort: <input type="password" name="pw"><br />
        <button type="submit">Login</button>
    </form>
    <?php } else { ?>
        <p>Sie sind bereits eingeloggt!</p>
        <form action="logout.php" method="POST">
            <button type="submit">Logout</button>
        </form>
    <?php } ?>
</body>
</html>