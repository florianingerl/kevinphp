<?php

class Database
{

    private $conn;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root2";
        $password = "ABC";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=wbd5100s3", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<h1>The connection to the database was successfull! </h1>\n";
        } catch (PDOException $e) {
            echo "<h1>Connection failed: " . $e->getMessage() . " </h1>\n";
        }
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function findUserByUsername($username)
    {
        $stmt = $this->conn->prepare("Select * from user where username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function insertIntoSessionLogger($session_id, $timestamp, $userid)
    {
        //Aktuell angemeldeten User aus der Session auslesen
        $sql = "Insert into session_logger (session_id, session_open, session_user) values (:session_id, :session_open, :session_user)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":session_id", $session_id);
        $stmt->bindParam(":session_open", $timestamp);
        $stmt->bindParam(":session_user", $userid);

        $stmt->execute();
    }
}
