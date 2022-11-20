<?php
session_start();

include 'User.php';
include 'Database.php';
?>


<html>

<head>
    <title>Forum für Künstler</title>
</head>



<body>
    <?php include 'header.php' ?>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = new User();
        $user->firstname = $_POST["firstname"];
        $user->lastname = $_POST["lastname"];
        $user->password = password_hash($_POST["password"], PASSWORD_DEFAULT );

        $user->email = $_POST["email"];

        
        $db = new Database();
        $db->insertUser($user);
    }


    ?>

    <div style="width: 500px; margin: 14px auto;">
        <h1>Registrierung</h1>
        <form action="signup.php" method="post">
            <p>Vorname:</p>
            <input type="text" name="firstname" id="firstname"></input>

            <p>Nachname:</p>
            <input type="text" name="lastname" id="lastname"></input>

            <p>E-Mail:</p>
            <input type="email" name="email" id="email"></input>

            <p>Password:</p>
            <input type="password" name="password" id="password"></input>

            <p>
                <input type="submit" value="Sign up"></input>
            </p>

        </form>

    </div>

</body>

</html>