<?php
session_start();

include "User.php";
include "Database.php";
include "Add.php";

?>

<html>

<head>
    <title>Künstlerforum</title>
</head>

<body>
    <?php include 'header.php';



    $db = new Database();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $add = new Add();
         $add->id = $_POST["addIdToEdit"];
         $add->title = $_POST["title"];
         $add->text = $_POST["text"];

         $db->updateAdd($add);

         echo "<p>The add was updated successfully! </p>";

    }
    else {

    $add = $db->getAddById( $_GET["addIdToEdit"] );

    ?>

    <div style="width:700px; margin: 6px auto">
        <form action="editadd.php" method="post" enctype="multipart/form-data">
            <p>Titel:</p>
            <input type="text" name="title" placeholder="Titel" value="<?php echo $add->title; ?>"></input>

            <p>Anzeigentext:</p>
            <textarea name="text" rows="20" cols="50" ><?php echo $add->text; ?></textarea>

            <!--
            <p>Bild:</p>
            <input type="file" name="fileToUpload" id="fileToUpload"> -->

            <input type="hidden" id="addIdToEdit" name="addIdToEdit" value="<?php echo $add->id; ?>">
            <p><input type="submit" value="Anzeige verändern"></input></p>

        </form>
    </div>

   <?php } ?>

</body>

</html>