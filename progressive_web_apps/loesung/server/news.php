<?php
/*
* Dieser Code ist nicht Teil der Aufgabenstellung. 
* Er kann aber genutzt werden, wenn ein eigener Server aufgesetzt werden soll, 
* oder um die Funktionsweise der API nachzuvollziehen.
*/

header('Content-Type: application/json');

$texte = [
    "Quantencomputer simuliert erstmals Frühstücksei korrekt",
    "Studierende entwickeln KI, die Vorlesungen zusammenfasst – Professor begeistert",
    "Code durch Kaffee ersetzt: Neuer Compiler übersetzt Koffein in JavaScript",
    "Erster Roboter besteht Turing-Test – gibt sich als IT-Helpdesk aus",
    "Open Source Projekt löst Problem, das niemand hatte – wird trotzdem gehypt",
    "Studie: Dark Mode spart keinen Strom, sieht aber cooler aus",
    "Informatik-Abschluss ersetzt Meditation bei Stressbewältigung",
    "Neues Framework veröffentlicht – sofort von 12 anderen abgelöst",
    "Programmierfehler entdeckt: Ursache war Katze auf Tastatur",
    "Sicherheitslücke in Passwortmanager – Nutzer setzen jetzt wieder auf Post-Its",
    "Hackathon endet in Pizzaüberdosis und bahnbrechender App",
    "Deep Learning Modell verwechselt Hund mit Stack Overflow Logo",
    "Python wird offiziell zur Amtssprache für Informatik erklärt",
    "Studierende programmieren Spiel, das nur besteht, wenn man nichts tut",
    "Update behebt 0 Fehler – fügt aber 3 neue hinzu",
    "Neuralnetzwerk dichtet IT-Gedichte – veröffentlicht ersten Lyrikband",
    "Virtual Reality ersetzt Praktikum – Studierende loben Reset-Knopf",
    "Studienarbeit verfasst von Chatbot erhält Bestnote – Professor: 'Wusste ich!'",
    "IoT-Toaster gehackt – macht jetzt Witze beim Toasten",
    "Rekord: Bug in nur 2 Sekunden gefunden – Eintrag ins Guinnessbuch folgt",
    "KI schreibt Bachelorarbeit – besser strukturiert als Mensch",
    "Smart Mirror erkennt schlechte Laune und schlägt Pause vor",
    "Neues Smartphone kann Quellcode kompilieren – durch Schütteln",
    "Forschende trainieren KI mit Memes – erstaunliche Ergebnisse",
    "USB-C endlich Standard – Entwickler feiern Weltfrieden",
    "Lernplattform ersetzt Pausen mit Katzenvideos für Motivation",
    "Firewall lernt sarkastisch zu antworten – Nutzer amüsiert",
    "Informatik-Professor veröffentlicht Hit-Single über Schleifen",
    "Algorithmen erkennen Frust – schlagen Schokolade vor",
    "Erster Drohne mit Humor – liefert Pakete mit Kalauer",
    "Compiler verweigert Arbeit – 'Syntax ist mir zu altmodisch'",
    "Team entwickelt Bug-Tracking-Software, die Bugs ignoriert",
    "Autonomer Stuhl rollt zur Kaffeemaschine – IT-Abteilung feiert",
    "IT-Festival setzt auf KI-DJs – überraschend guter Bass",
    "Smartwatch erkennt Programmierblockaden – startet Spotify",
    "Neues Projektmanagement-Tool enthält integrierten Therapeutenmodus",
    "Studierende lösen Aufgabe per Morsecode – 'weil wir’s können'",
    "Open-Source-Projekt erstellt von KI – Maintainer suchen jetzt Sinn",
    "Neues Interface: Programmieren durch Summen",
    "Security-Konferenz endet mit großem Lacher – Passwort war 'admin'",
    "Code-Editor schlägt vor: 'Mach erstmal Pause.'",
    "KI analysiert Code und erstellt Memes daraus",
    "Rechenzentrum nutzt Hitze für Fußbodenheizung",
    "Bug reproduziert sich nur bei Vollmond – Entwickler ratlos",
    "Betriebssystem tanzt Samba nach Kernel-Update",
    "Praktikant verbessert Legacy-Code – Welt hält kurz den Atem an",
    "Informatik-Fachschaft verteilt Kekse mit QR-Codes zu Tutorials",
    "Studierende bauen Handy mit Kurbel – keine Akkuprobleme mehr",
    "Datenbank weigert sich, vor 10 Uhr zu arbeiten",
    "Syntaxfehler entpuppt sich als Poesie",
    "Studie belegt: Programmierhumor steigert Lernerfolg"
];


shuffle($texte);
$result = [
    'date' => date('d.m.Y H:i:s'),
    'title' => $texte[0]
];
echo json_encode($result);
