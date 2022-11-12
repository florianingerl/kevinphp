<?php


$servername = "localhost";
$username = "root2";
$password = "ABC";

try {
  $conn = new PDO("mysql:host=$servername;dbname=wbd5100s3", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$username = $_POST["username"];
$password = $_POST["password"];

echo "Username was " . $username . "\n";
echo "Password was " . $password . "\n";

$stmt = $conn->prepare("Select * from user where username = '$username'");
$stmt->execute();

// set the resulting array to associative
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();

if( count($result) == 0 ){
    echo "User " . $username . " does not exist!";
    
}
else {
    if( $result[0]["password"] != $password ){
        echo "Password was invalid";
    }
    else {
        echo "Login successfull!";
        include 'session_logger.php';
    }
}




?>