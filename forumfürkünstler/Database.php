<?php

class Database
{
    private $conn;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root2";
        $password = "ABC";
        $databasename = "kuenstlerforum";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<h1>The connection to the database was successfull! </h1>\n";
        } catch (PDOException $e) {
            echo "<h1>Connection failed: " . $e->getMessage() . " </h1>\n";
        }
    }

    public function insertUser($user)
    {
        try {
            $sql = "INSERT INTO users (email, firstname, lastname, password )
  VALUES (:email, :firstname, :lastname, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":firstname", $user->firstname);
            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":password", $user->password);
            $stmt->bindParam(":lastname", $user->lastname);

            // use exec() because no results are returned
            $stmt->execute();
            echo "<h1>New user was successfully in inserted into database!</h1>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
