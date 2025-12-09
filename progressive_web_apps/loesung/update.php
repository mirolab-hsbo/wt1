<?php
/*
* Dieser Code ist nicht Teil der Aufgabenstellung. 
* Er kann aber genutzt werden, wenn ein eigener Server aufgesetzt werden soll, 
* oder um die Funktionsweise der API nachzuvollziehen.
*/

header('Content-Type: application/json');

echo json_encode(["update_available" => true]);
