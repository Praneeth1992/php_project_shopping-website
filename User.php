<?php
class User {
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "ls2538858";
    private $dbName     = "4you";
    private $userTbl    = 'users';
    
    function __construct(){
        if(!isset($this->db)){
         
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    function checkUser($userData = array()){
        if(!empty($userData)){
            
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE email_id = '".$userData['email']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
               
                $query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."'";
                $update = $this->db->query($query);
            }else{
              
                $query = "INSERT INTO ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."'";
                $insert = $this->db->query($query);
            }
            
            
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
        
        
        return $userData;
    }
}

?>