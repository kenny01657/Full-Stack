<?php

class db {
    private $servername = "db";
    private $username = "devuser";
    private $password = "devpass";
    private $dbname = "full_stack";
    private $conn;
    
    public function conn() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "<p>And we have PDO connection!</p>";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function register($firstname, $lastname, $email, $username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (firstname, lastname, email, username, password) VALUES ('$firstname', '$lastname', '$email', '$username', '$hash')";
        return $this->conn->exec($query);
    }

    public function login($username, $password) {
        $query = $this->conn->prepare("SELECT password FROM user WHERE username = '$username'");
        $query->execute();
        if(password_verify($password, $query->fetch()[0])) {
            return true;
        } else {
            return false;
        }
    }
}