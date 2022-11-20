<?php
session_start();

include "User.php";
include "Database.php";
include "Add.php";
include "Message.php";


$db = new Database();

$m = new Message();
$m->text = $_GET["replyText"];

$user = $db->findUserByEMail($_SESSION["loggedUser"]);
$m->fromEmail = $user->email;

$messageToReplyTo = $db->getMessageById( $_GET["replyToMessage"]);

$m->preId = $messageToReplyTo->id;
$m->toEmail = $messageToReplyTo->fromEmail;
$m->addId = $messageToReplyTo->addId;

$db->insertNewReplyMessage($m);

if($db->getErrorMessage() == ""){
    echo "Your reply was sent successfully!";
}
else {
    echo $db->getErrorMessage();
}


?>