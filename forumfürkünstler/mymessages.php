<?php
session_start();

include "Database.php";
include "User.php";
include "Add.php";
include "Message.php";



?>

<html>

<head>
    <title>Künstlerforum</title>
</head>

<body>
    <?php
    include "header.php";

    $db = new Database();
    $user = $db->findUserByEMail($_SESSION["loggedUser"]);
    $mymessages = $db->getMessagesToOrFromUser($user);

    if (count($mymessages) == 0) {
        echo "<p>You haven't got any messages!</p>";
    }

    for ($i = 0; $i < count($mymessages); $i++) {
        $m = $mymessages[$i];
        $add = $db->getAddById($m->addId);
        $fromUser = $db->findUserByEMail($m->fromEmail);
    ?>

        <div>
            <h1>Nachrichten zu deiner Anzeige <?php echo $add->title . " von " . $fromUser->firstname . " " . $fromUser->lastname; ?> </h1>

            <div style="background-color: yellow; color: black">
                <?php echo $m->text; ?>
            </div>

            <textarea id="reply<?php echo $m->id; ?>" ncols = "100" nrows = "20">

            </textarea>
            <p>
                <button class="mybutton" onclick="replyToMessage(<?php echo $m->id; ?>);">Reply</button>
            </p>

            <p id="feedback<?php echo $m->id; ?>">
            </p>
        </div>

    <?php

    }

    ?>

    <script>
        function replyToMessage(messageId) {
            alert("The reply was pressed " + messageId);

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("feedback" + messageId).innerHTML = this.responseText;
            }
            let replyText = document.getElementById("reply" + messageId).value;

            xhttp.open("GET", "sendreplymessage.php?replyText="+replyText+"&replyToMessage="+messageId, true);
            xhttp.send();
        }
    </script>

</body>

</html>