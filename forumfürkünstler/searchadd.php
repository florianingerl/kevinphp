<?php
session_start();

include 'Database.php';
include 'Add.php';
include 'User.php';
include 'FileUploader.php';


?>


<body>
    <?php
    include 'header.php';

    $db = new Database();
    $fu = new FileUploader();
    $myadds = $db->findAddsByKeyword($_GET["search"]);

    for ($i = 0; $i < count($myadds); $i++) {
        $add = $myadds[$i];

    ?>
        <div style="border: 1px solid orange; padding: 5px; margin: 10px;">
            <h1><?php echo $add->title; ?> </h1>

            <img style="float:left" src="<?php echo $fu->getImageForAdd($add); ?>" height="50px"></img>
            <p>
                <?php echo $add->text; ?>
            </p>
            <p>Nachricht:</p>
            <textarea id="message" ncols="50" nrows="4"></textarea>
            <p><button class="mybutton" onclick="sendMessage(<?php echo $add->id; ?>);">Nachricht senden!</button> </p>
            <!--
            <p>
                <a href="myadds.php?addIdToDelete=<?php echo $add->id; ?>" onclick="return confirm('Do you really want to delete this add?');" class="mybutton">Delete</a>
                <a href="editadd.php?addIdToEdit=<?php echo $add->id; ?>" class="mybutton">Edit</a>
            </p> -->
        </div>

    <?php
    }



    ?>

    <p id="demo">

    </p>

    <script>
        function sendMessage(addid) {
           
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    document.getElementById("demo").innerHTML = this.responseText;
                }
                xhttp.open("GET", "sendmessage.php?addid=" + addid , true);
                xhttp.send();
            

        }
    </script>

</body>