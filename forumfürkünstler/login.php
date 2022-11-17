<?php
session_start();

include 'Database.php';
include 'User.php';
?>

<html>
<head>

</head>
<body>
    <?php 

    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

        $db = new Database();
        $user = $db->findUserByEMail($_POST["email"]);

        if( $user == null ){
            $message = "<p style=\"color:red\">User with that email does not exist! </p>";
        }
        else if( $user->password != $_POST["password"]) {
            $message = "<p style=\"color:red\">You entered the wrong password! </p>";
        } 
        else {
            $_SESSION["loggedUser"] = $user->email;
            $message =  "<h1>Congratulations! You have successfully logged in! You can now offer something beautiful!</h1>";
        }


    }

    include 'header.php'; 

    echo $message;

    if(! isset($_SESSION["loggedUser"])){ ?>
    <div style="width: 500px; margin: 14px auto;">
        <form action="login.php" method="post">
            <p>E-Mail:</p>
            <input type="email" name="email" placeholder="E-Mail"></input>
            
            <p>Password:</p>
            <input type="password" name="password" placeholder="Password"></input>

            <p>
            <input type="submit" value="Sign in"></input>
            </p>
            
        </form>

    </div>
    <?php } ?>
   
</body>

</html>