<?php

class User {

    private string $username;
    private string $userid;
    private string $password;

    function __construct($result){
        $this->username = $result["username"];
        $this->userid = $result["id"];
        $this->password = $result["password"];
    }

    function getUsername(){
        return $this->username;

    }

    function getUserId(){
        return $this->userid;
    }

    function getPassword(){
        return $this->password;
    }


}