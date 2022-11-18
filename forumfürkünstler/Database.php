<?php

class Database
{
    private $conn;
    private $errorMessage;

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
            //echo "<h1>The connection to the database was successfull! </h1>\n";
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
            //echo "<h1>New user was successfully in inserted into database!</h1>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function findUserByEMail($email){

        $stmt = $this->conn->prepare("select * from users where email = :email");
 
        $stmt->bindParam(":email", $email);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        if( count($result) == 0 ){
            return null;
        }
        else{
            
            $user = new User();
            $user->email = $email;
            $user->password = $result[0]["password"];
            $user->firstname = $result[0]["firstname"];
            $user->lastname = $result[0]["lastname"];
            return $user;
        }
    }
    public function insertNewAdd($add){
        try {
            $sql = "INSERT INTO adds (title, text, useremail )
  VALUES (:title, :text, :useremail)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":title", $add->title);
            $stmt->bindParam(":text", $add->text);
            $stmt->bindParam(":useremail", $add->user->email);

            // use exec() because no results are returned
            $stmt->execute();
            //echo "<h1>New user was successfully in inserted into database!</h1>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function findAllAddsFromUser ($user){
        $stmt = $this->conn->prepare("select * from adds where useremail = :email");
 
        $stmt->bindParam(":email", $user->email);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        $adds = array();
        for($i=0; $i < count($result); $i++){
            $add = new Add();
            $add->id = $result[$i]["id"];
            $add->text = $result [$i]["text"];
            $add ->title = $result[$i]["title"];             
            $add->user = $user;
            $adds[$i] = $add;
        }
        return $adds;

       
    }

    public function deleteAddWithId ($id){
        $this->errorMessage = null;
        try {
        $stmt = $this->conn->prepare("delete from adds where id= :id");
        $stmt->bindParam(":id", $id);

        $stmt->execute();
        }
        catch(PDOException $e){
            $this->errorMessage = $e->getMessage();
        }
    }

    public function getMaxAddId(){
       $stmt =  $this->conn->prepare("select max(id) from adds");
        
    }

}
