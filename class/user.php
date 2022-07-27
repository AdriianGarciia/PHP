<?php
    class User {
        private $conn;
        private $db_table = "contact";
        public $contactId;
        public $name;
        public $phone;
        public $date;
        public $status;

        public function __construct($db){
            $this->conn = $db;
        }

        public function getUsers(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
 
        public function createUser(){
            $sqlQuery = "INSERT INTO " . $this->db_table . "
                SET 
                    name = :name,
                    phone = :phone,
                    date = :date,
                    status = :status";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":date", $this->date);
            $stmt->bindParam(":status", $this->status);


            if ($stmt->execute()) {
                return true;
                
            }
            return false;
        }

     public function updateUser(){
        $sqlQuery = "UPDATE " . $this->db_table . "
            SET 
                name = :name,
                phone = :phone,
                date = :date,
                status = :status 
                WHERE 
                    contactId= :userId";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":date", $this->date);
            $stmt->bindParam(":status", $this->status);
            $stmt->bindParam(":userId", $this->userId);


            if ($stmt->execute()) {
                return true;
                
            }
            return false;
        }

        public function deleteUser(){
            $sqlQuery = "DELETE FROM " . $this->db_table . "

                     WHERE 

                    contactId= :userId";

                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->bindParam(":userId", $this->userId);
    
    
                if ($stmt->execute()) {
                    return true;
                    
                }
                return false;
        }
        
        public function getSingleUser(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "  
                WHERE 
                    contactId = :userId LIMIT 1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(":userId", $this->userId);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->name = $dataRow['name'];
            $this->phone = $dataRow['phone'];
            $this->date = $dataRow['date'];
            $this->status = $dataRow['status'];
            $this->userId = $dataRow['contactId'];
        }

    }


    
?>