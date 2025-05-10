<?php
class BmiModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function saveBmiRecord($user_id, $name, $weight, $height, $bmi, $status) {
        $query = "INSERT INTO bmi_records 
                 (user_id, name, weight, height, bmi, status) 
                 VALUES (:user_id, :name, :weight, :height, :bmi, :status)";
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":weight", $weight);
        $stmt->bindParam(":height", $height);
        $stmt->bindParam(":bmi", $bmi);
        $stmt->bindParam(":status", $status);
        
        return $stmt->execute();
    }

    public function getBmiHistory($user_id) {
        $query = "SELECT * FROM bmi_records WHERE user_id = :user_id ORDER BY timestamp DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>