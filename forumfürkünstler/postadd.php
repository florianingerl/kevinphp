<?php
session_start();

include 'Database.php';
include 'User.php';
include 'Add.php';
?>

<html>
    <head>
        <title>Künstlerforum</title>
    </head>

    <body>
        <?php
            include 'header.php';
            $db = new Database();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $add = new Add();
                $add->title = $_POST["title"];
                $add->text = $_POST["text"];
                $user = $db->findUserByEMail($_SESSION["loggedUser"]);
                $add->user = $user;

                $db->insertNewAdd($add);

            }

        ?>



        <div style="width:700px; margin: 6px auto">
            <form action="postadd.php" method="post">
                <p>Titel:</p>
                <input type="text" name="title" placeholder="Titel"></input>

                <p>Anzeigentext:</p>
                <textarea name="text" rows="20" cols="50"></textarea>
                <p><input type="submit" value="Veröffentlichen"></input></p>
                
            </form>
        </div>
    </body>



</html>