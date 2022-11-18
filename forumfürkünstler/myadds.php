<?php
session_start();

include 'User.php';
include 'Database.php';
include 'Add.php';



?>
<html>
<head>
    <title>Künstlerforum</title>
</head>

<body>
    <?php include 'header.php'; 
    
    $db = new Database();
    
    $user = $db->findUserByEMail($_SESSION["loggedUser"]);

    if(isset($_GET["id"])){
        $db->deleteAddWithId($_GET["id"]);
        echo "<p>An add was deleted!</p>";
    }

    $myadds = $db->findAllAddsFromUser($user);

    for($i=0; $i < count($myadds); $i++){
        $add = $myadds[$i];

        ?>
<div style="border: 1px solid orange; padding: 5px; margin: 10px;">
    <h1><?php echo $add->title; ?> </h1>
    
    <img style="float:left" src="assets\img\logo.png" height="50px"></img>
    <p>
    <?php echo $add->text; ?> 
    </p>
    <p>
        <a href="myadds.php?id=<?php echo $add->id; ?>" class="mybutton">Delete</a>
    </p>
</div>

<?php
    }

    

    ?>
</body>

</html>