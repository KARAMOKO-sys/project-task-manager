<?php
/**
 use Priority;
use PDO;
use PDOException;

class PriorityRepository {
    private $db;

    public function __constructor(PDO $db){
        $this->db = $db;
    }

    public function findAll(){
        try{
            $stmt = $this->db->prepare("SELECT * FROM priorities");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, Priority::class);
        }catch(PDOException $e){
            error_log("Error fetching all priorities: " .$e->getMessage());
            return [];
        }  
    }
}
 */

?>