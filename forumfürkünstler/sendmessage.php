<?php


session_start();

include 'User.php';
include 'Add.php';
include 'Database.php';
include 'Message.php';


$db = new Database();

$message = new Message();
$message->text = $_GET["message"];
$message->addId = $_GET["addid"];
$message->fromEmail = $_SESSION["loggedUser"];
$message->toEmail = $db->findUserWhoPostedTheAdd($_GET["addid"])->email;

$db->insertMessage($message);

if($db->getErrorMessage() == ""){
    echo "Your message was successfully sent!";
}
else {
    echo "Your message could not be sent for some reason! The reason was:" . $db->getErrorMessage();
}

?>