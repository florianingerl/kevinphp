<?php
session_start();

include "Database.php";
include "User.php";
include "Add.php";
include "Message.php";
include "FileUploader.php";



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
    $fu = new FileUploader();

    if (isset($_POST["text"])) {
        $m = new Message();
        $m->text = $_POST["text"];
        $_GET["fmId"] = $_POST["fmId"];

        $user = $db->findUserByEMail($_SESSION["loggedUser"]);
        $m->fromEmail = $user->email;

        $messageToReplyTo = $db->getMessageById($_POST["replyToMessage"]);

        $m->preId = $messageToReplyTo->id;
        $m->toEmail = $messageToReplyTo->fromEmail;
        $m->addId = $messageToReplyTo->addId;

        $db->insertNewReplyMessage($m);

        if ($db->getErrorMessage() == "") {
            echo "Your reply was sent successfully!";
        } else {
            echo $db->getErrorMessage();
        }
    }


    ?>

    <style>
        .mes1 {
            display: flex;
            flex-direction: row;
            height: 600px;
        }

        .mes2 {
            width: 50%;
            overflow-y: scroll;
            border: solid 1px red;
        }

        .chat {
            width: 50%;
            border: solid 1px green;
        }

        .fm {
            border-bottom: solid 1px black;
            display: block;
            text-decoration: none;
            cursor: pointer;
        }

        .active {
            background-color: red;
            color:white;
        }

        .chat1 {
            height: 60%;
            overflow-y: scroll;
        }

        .send {
            height: 40%;
        }

        .mfme {
            float: left;
            background-color: green;
            color: white;
            border-radius: 5px;
            padding: 5px;
            margin: 5px;
            width: 50%;
        }

        .mnfme {
            float: right;
            background-color: red;
            color: white;
            border-radius: 5px;
            padding: 5px;
            margin: 5px;
            width: 50%;

        }
    </style>

    <h1>Meine Nachrichten</h1>
    <div class="mes1">
        <div class="mes2">
            <?php
            $messages = $db->findAllFirstMessagesToOrFromUser($user);

            for ($i = 0; $i < count($messages); $i++) {
                $m = $messages[$i];

                $userFrom = $db->findUserByEMail($m->fromEmail);
                $add = $db->getAddById($m->addId);
            ?>

                <a class="fm <?php if(isset($_GET["fmId"]) && $m->id == $_GET["fmId"]){ echo "active";} ?>" href="mymessages2.php?fmId=<?php echo $m->id; ?>">
                    <p>Nachricht von <?php echo $userFrom->firstname . " " . $userFrom->lastname; ?></p>
                    <h3><?php echo $add->title; ?></h3>
                    <img src="<?php echo $fu->getImageForAdd($add); ?>" height="40px"></img>
                </a>

            <?php
            }
            ?>
        </div>
        <div class="chat">
            <?php $lastMessage = null; ?>
            <div class="chat1">
                <?php
                if (!isset($_GET["fmId"])) {
                    echo "Please select a chat on the left hand side!";
                } else {
                    $m = $db->getMessageById($_GET["fmId"]);

                    while (isset($m)) {
                ?>
                        <div class="onem">
                            <div class="<?php if ($m->fromEmail == $user->email) {
                                            echo "mfme";
                                        } else {
                                            echo "mnfme";
                                        } ?>">
                                <?php echo $m->text; ?>
                            </div>
                        </div>

                <?php

                        $lastMessage = $m;                
                        if (isset($m->postId)) {
                            $m = $db->getMessageById($m->postId);
                        } else {
                            $m = null;
                        }
                    }
                }
                ?>
            </div>

            <form class="send" action="mymessages2.php" method="post">
                <p>Nachricht:</p>
                <textarea style="width:100%; height:150px" nrows="30" name="text">

                        </textarea>
                <input type="hidden" value="<?php echo $lastMessage->id; ?>" name="replyToMessage"></input>
                <input type="hidden" value="<?php echo $_GET["fmId"]; ?>" name="fmId"></input> 
                <p>
                    <input type="submit" value="Senden"></input>
                </p>
            </form>

        </div>
    </div>

</body>

</html>