<html>
<head>
  <title>Validation des Login</title>
</head>
<body>

<?php

include 'src/Database.php';
include 'src/User.php';
$db = new Database();


$username = $_POST["username"];
$password = $_POST["password"];

echo "<p> Username was " . $username . "</p>\n";
echo "<p>Password was " . $password . "</p>\n";

$result = $db->findUserByUsername($username);

if( count($result) == 0 ){
    echo "<p>User " . $username . " does not exist!</p>";
}
else {
    $user = new User($result[0]);
    if( $user->getPassword() != $password ){
        echo "<p>Password was invalid</p>";
    }
    else {
        echo "<p>Login successfull!</p>";
        include 'session_logger.php';
    }
}




?>


</body>

</html>