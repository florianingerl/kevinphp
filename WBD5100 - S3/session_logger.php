<?php
/* Dieses PHP Script soll bei erfolgreichem Login die Daten der aktuellen Session in der DB speichern
dazu wird zuerst eine Session-ID als GUID erzeugt. Anschließend wird die aktuelle Uhrzeit abgefragt. 
Beide Daten werden dann anschließend zusammen mit der User-ID in der DB gespeichert. */

require_once __DIR__ . '/src/ActualTime.php';
require_once __DIR__ . '/src/SessionIdGenerator.php';
require_once __DIR__ . '/src/LoggedInUser.php';


echo "Das session_logger-Skript wird ausgeführt!";
//Session-ID generieren und in der Variable sessionid speichern
$SessionIdGenerator = new SessionIdGenerator();

//Aktuelle Zeit als UNIX- Timestamp in der Variable actual Time speichern
$AcutalTime = new ActualTime();
$timestamp = $AcutalTime->getTimestamp();

//Aktuell angemeldeten User aus der Session auslesen
