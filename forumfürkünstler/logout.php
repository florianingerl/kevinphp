<?php
session_start();

include 'Database.php';
include 'User.php';

?>

<html>
    <head>
        <title>Künstlerforum</title>
    </head>

    <body>
        <?php 

        $_SESSION["loggedUser"] = null;
        include 'header.php';
        ?>
        <h1>Congratulations! You have logged out! </h1>


    </body>


</html>