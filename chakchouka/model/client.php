<?php
require_once __DIR__ . '/../config/Database.php';

class Client {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Create a client
    public function createClient($name, $phone_number) {
        $sql = "INSERT INTO clients (name, phone_number) VALUES (:name, :phone_number)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone_number', $phone_number);
        return $stmt->execute();
    }

    // Read all clients
    public function getAllClients() {
        $sql = "SELECT * FROM clients";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update a client
    public function updateClient($id, $name, $phone_number) {
        $sql = "UPDATE clients SET name = :name, phone_number = :phone_number WHERE client_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete a client
    public function deleteClient($id) {
        $sql = "DELETE FROM clients WHERE client_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
