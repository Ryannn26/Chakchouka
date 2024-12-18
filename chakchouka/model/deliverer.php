<?php
require_once __DIR__ . '/../config/Database.php';

class Deliverer {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Create a deliverer
    public function createDeliverer($name, $phone_number) {
        $sql = "INSERT INTO deliverers (name, phone_number) VALUES (:name, :phone_number)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone_number', $phone_number);
        return $stmt->execute();
    }

    // Read all deliverers
    public function getAllDeliverers() {
        $sql = "SELECT * FROM deliverers";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update a deliverer
    public function updateDeliverer($id, $name, $phone_number) {
        $sql = "UPDATE deliverers SET name = :name, phone_number = :phone_number WHERE deliverer_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete a deliverer
    public function deleteDeliverer($id) {
        $sql = "DELETE FROM deliverers WHERE deliverer_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
