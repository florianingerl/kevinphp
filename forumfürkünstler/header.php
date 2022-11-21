<style>

* {
    margin: 5px;
    padding: 0px;
    box-sizing: border-box;
}

#search {
    display:block;
    width: 200px;
}

.mybutton {
    padding: 6px;
    border-radius: 5px;
    background-color: blue;
    color: white;
}

.mybutton:hover {
    background: white;
    color: blue;
    border: 1px solid blue;
    cursor: pointer;
}

#mynavbar {
    display: flex;
    flex-direction: row;
    border-radius: 5px;
    border: solid 1px orange;
    align-items: center;
    list-style-type: none;
    
}

a {
    text-decoration: none;
}

#logo {
    text-transform: uppercase;
    color: orange ;
    font-size: 25px;
}

.meinsmenu {
    color: orange;
    font-size: 20px;
    position: relative;
    padding: 5px;
    border-radius: 2px;
    border: solid 1px orange;
    border-bottom: none;
    margin-bottom: 0px;
}

.meinssubmenu {
    display: none;
    width: 200px;
    position: absolute;
    top: 100%;
    right: 0;
    border: solid 1px orange;
    border-top: none;
    list-style-type: none;
    background-color: white;
    color:orange;
    margin-top: 0px;

}

.meinssubmenu a {
    padding: 5px;
}

.meinssubmenu a:hover {
    font-weight: bold;
    text-decoration: underline;
}

.meinsmenu:hover .meinssubmenu {
    display: flex;
    flex-direction: column;
}
    </style>

<ul id="mynavbar">

<li><a href="index.php"><img src="assets/img/logo.png" height="100px"></img></a></li>
<li><a href="index.php" id="logo">Künstlerforum</a></li>
<li><form action="searchadd.php" method="GET"> <input type="text" id="search" name="search" placeholder="Search" ></input>  </li>
<input type="submit" class="mybutton" value="Search"></input> </form> </li>
<?php if(!isset( $_SESSION["loggedUser"]) ){ ?>
<li><a href="login.php" class="mybutton">Sign&nbsp;in</a></li>
<li><a href="signup.php" class="mybutton">Sign&nbsp;up</a> </li>
<?php } else { ?>
<li><a href="postadd.php" class="mybutton">Neue&nbsp;Anzeige</a></li>
<li><a href="logout.php" class="mybutton">Logout</a></li>
<li> <div style="display:flex; flex-direction: column; align-items: center;"> <div style="color:orange; font-size: 15px;">You are logged in as <?php

$email = $_SESSION["loggedUser"];
$db = new Database();
$user = $db->findUserByEMail($email); 
echo $user->firstname . " " . $user->lastname ;
?> </div> <div class="meinsmenu">Meins<ul class="meinssubmenu"><li><a href="mymessages.php">Nachrichten</a> </li><li><a href="myadds.php">Anzeigen</a></li><li><a href="myprofile.php">Profil</a></li> </ul></div>  </div> </li>

<?php } ?>



</ul>