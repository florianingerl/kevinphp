<?php

session_start();

include 'User.php';
include 'Add.php';
include 'Database.php';
include 'FileUploader.php';


?>

<html>

<head>
    <title>Künstlerforum</title>

    <style>
        .profilecontainer {
            border: solid 1px orange;
            padding: 5px;
            border-radius: 5px;
        }

        .dataandpicture {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    include 'header.php';

    $db = new Database();
    $user = $db->findUserByEMail($_SESSION["loggedUser"]);
    $fu = new FileUploader();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $fu->uploadImageForUser($user);

            echo "<p>Your profile picture was successfully uploaded!</p>";
        }
    ?>

    <div class="profilecontainer">
        <h1>Profil</h1>
        <div class="dataandpicture">
            <table style="width: 400px">
                <tr>
                    <td class="label">Vorname:</td>
                    <td><?php echo $user->firstname; ?></td>
                </tr>
                <tr>
                    <td class="label">Nachname:</td>
                    <td><?php echo $user->lastname; ?></td>
                </tr>
                <tr>
                    <td class="label">Email:</td>
                    <td><?php echo $user->email; ?></td>
                </tr>
            </table>

            <div>
                <div style="width:200px"><img style="width:100%" src="<?php echo $fu->getImageForUser($user); ?>"></img> </div>

                <form action="myprofile.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload"></input>
                    </br><input type="submit" class="mybutton" value="Foto ändern"></input>
                </form>
            </div>

        </div>
    </div>

</body>

</html>