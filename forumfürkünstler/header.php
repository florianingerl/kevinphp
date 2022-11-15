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

</style>

<ul id="mynavbar">

<li><input type="text" id="search" name="search" placeholder="Search" ></input>  </li>
<li><a href="search.php" class="mybutton">Search</a></li>
<li><a href="login.php" class="mybutton">Sign in</a></li>
<li><a href="signup.php" class="mybutton">Sign up</a> </li>

</ul>