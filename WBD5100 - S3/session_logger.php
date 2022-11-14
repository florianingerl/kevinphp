<?php
/* Dieses PHP Script soll bei erfolgreichem Login die Daten der aktuellen Session in der DB speichern
dazu wird zuerst eine Session-ID als GUID erzeugt. Anschließend wird die aktuelle Uhrzeit abgefragt. 
Beide Daten werden dann anschließend zusammen mit der User-ID in der DB gespeichert. */

require_once __DIR__ . '/src/ActualTime.php';
require_once __DIR__ . '/src/SessionIdGenerator.php';
require_once __DIR__ . '/src/LoggedInUser.php';


echo "<p>Das session_logger-Skript wird ausgeführt!</p>";
//Session-ID generieren und in der Variable sessionid speichern
$SessionIdGenerator = new SessionIdGenerator();
$session_id = $SessionIdGenerator->getSessionId();

//Aktuelle Zeit als UNIX- Timestamp in der Variable actual Time speichern
$AcutalTime = new ActualTime();
$timestamp = $AcutalTime->getTimestamp();

$userid = $user->getUserId();

$db->insertIntoSessionLogger($session_id, $timestamp, $userid);
