<?php
$formular_gesendet = isset($_GET["absenden"]);
$formular_validiert = false;

$name = "";
$fach = "";
$meldung = "";

if ($formular_gesendet) {
    if (isset($_GET["name"])) {
        $name = trim($_GET["name"]);
    }

    if (isset($_GET["fach"])) {
        $fach = trim($_GET["fach"]);
    }

    if (empty($name) || empty($fach)) {
        $meldung = "Bitte füllen Sie alle Felder aus.";
    } elseif (strlen($name) < 2) {
        $meldung = "Der Name muss mindestens zwei Zeichen lang sein.";
    } else {
        $meldung = "Die Eingaben wurden erfolgreich verarbeitet.";
        $formular_validiert = true;
    }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Kursanmeldung</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
            background-color: #f2f4f7;
            color: #263447;
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }

        main {
            padding: 28px;
            border-radius: 12px;
            background-color: white;
            box-shadow: 0 4px 16px rgba(30, 50, 70, 0.1);
        }

        h1 {
            margin-top: 0;
            color: #174f7d;
        }

        label {
            display: block;
            margin-top: 18px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            margin-top: 6px;
            padding: 10px;
            border: 1px solid #aab4bf;
            border-radius: 6px;
            font: inherit;
        }

        button {
            margin-top: 24px;
            padding: 11px 20px;
            border: 0;
            border-radius: 6px;
            background-color: #1769aa;
            color: white;
            font: inherit;
            font-weight: bold;
            cursor: pointer;
        }

        .meldung {
            margin-top: 24px;
            padding: 14px;
            border-left: 5px solid #1769aa;
            background-color: #edf5fb;
        }

        .ergebnis {
            margin-top: 24px;
            padding: 20px;
            border-radius: 8px;
            background-color: #eef8f0;
        }

        .ergebnis h2 {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <main>
        <h1>Anmeldung zu einem Hochschulkurs</h1>

        <p>
            Bitte geben Sie einige persönliche Informationen ein.
            Die Daten werden mit der HTTP-Methode GET übertragen.
        </p>

        <form method="get" action="formular.php">
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name">

            <label for="fach">Gewünschter Kurs</label>
            <select id="fach" name="fach">
                <option value="">Bitte auswählen</option>

                <option value="Webtechnologien 1">
                    Webtechnologien 1
                </option>

                <option value="Programmierung 1">
                    Programmierung 1
                </option>

                <option value="Datenbanken">
                    Datenbanken
                </option>
            </select>

            <button type="submit" name="absenden" value="1">
                Angaben absenden
            </button>
        </form>

        <?php
        if ($formular_gesendet) {
            echo '<p class="meldung">';
            echo htmlspecialchars($meldung);
            echo '</p>';
        }

        if ($formular_validiert) {
            echo '<section class="ergebnis">';
            echo "<h2>Ihre Angaben</h2>";

            echo "<p><strong>Name:</strong> ";
            echo htmlspecialchars($name);
            echo "</p>";

            echo "<p><strong>Kurs:</strong> ";
            echo htmlspecialchars($fach);
            echo "</p>";

            echo "</section>";
        }
        ?>
    </main>
</body>

</html>