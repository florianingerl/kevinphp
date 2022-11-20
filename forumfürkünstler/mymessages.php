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
    $user = $db->findUserByEMail( $_SESSION["loggedUser"]);
    $mymessages = $db->getMessagesToOrFromUser( $user );

    if( count($mymessages) == 0){
        echo "<p>You haven't got any messages!</p>";
    }

    for($i=0; $i < count($mymessages); $i++){
            $m = $mymessages[$i];
            $add = $db->getAddById($m->addId);
        ?>

        <div>
            <h1>Nachricht zu deiner Anzeige <?php echo $add->title; ?> </h1>
            <div style="background-color: yellow; color: black">
                <?php echo $m->text; ?>
            </div>
            <p>
                <button class="mybutton">Reply</button>
            </p>
        </div>

        <?php

    }

?>

</body>
</html>