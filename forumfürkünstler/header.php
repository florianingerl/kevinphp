<style>

* {
    margin: 5px;
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

</style>

<ul id="mynavbar">

<li><a href="index.php"><img src="assets/img/logo.png" height="100px"></img></a></li>
<li><a href="index.php" id="logo">Künstlerforum</a></li>
<li><input type="text" id="search" name="search" placeholder="Search" ></input>  </li>
<li><a href="search.php" class="mybutton">Search</a></li>
<?php if(!isset( $_SESSION["loggedUser"]) ){ ?>
<li><a href="login.php" class="mybutton">Sign in</a></li>
<li><a href="signup.php" class="mybutton">Sign up</a> </li>
<?php } else { ?>
<li><a href="logout.php" class="mybutton">Logout</a></li>
<li style="color:orange; font-size: 17px;">You are logged in as <?php
include 'User.php';
$user = $_SESSION["loggedUser"];
echo $user->email ;
?></li>

<?php } ?>

</ul>