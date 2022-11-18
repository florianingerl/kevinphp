<?php
session_start();

include 'User.php';
include 'Database.php';
include 'Add.php';
include 'FileUploader.php';



?>
<html>
<head>
    <title>Künstlerforum</title>
</head>

<body>
    <?php include 'header.php'; 
    
    $db = new Database();
    
    $user = $db->findUserByEMail($_SESSION["loggedUser"]);

    if(isset($_GET["addIdToDelete"])){
        $db->deleteAddWithId($_GET["addIdToDelete"]);
        echo "<p>An add was deleted!</p>";
    }

    $myadds = $db->findAllAddsFromUser($user);

    $fu = new FileUploader();

    for($i=0; $i < count($myadds); $i++){
        $add = $myadds[$i];

        ?>
<div style="border: 1px solid orange; padding: 5px; margin: 10px;">
    <h1><?php echo $add->title; ?> </h1>
    
    <img style="float:left" src="<?php echo $fu->getImageForAdd($add); ?>" height="50px"></img>
    <p>
    <?php echo $add->text; ?> 
    </p>
    <p>
        <a href="myadds.php?addIdToDelete=<?php echo $add->id; ?>" class="mybutton">Delete</a>
        <a href="editadd.php?addIdToEdit=<?php echo $add->id; ?>" class="mybutton">Edit</a>
    </p>
</div>

<?php
    }

    

    ?>
</body>

</html>