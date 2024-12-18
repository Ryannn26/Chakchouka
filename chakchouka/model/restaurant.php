<?php
require_once __DIR__ . '/../config/Database.php';

class Restaurant {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Create a restaurant
    public function createRestaurant($name, $place, $total_tables, $available_tables, $phone_number) {
        $sql = "INSERT INTO restaurants (name, place, total_tables, available_tables, phone_number) 
                VALUES (:name, :place, :total_tables, :available_tables, :phone_number)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':place', $place);
        $stmt->bindParam(':total_tables', $total_tables);
        $stmt->bindParam(':available_tables', $available_tables);
        $stmt->bindParam(':phone_number', $phone_number);
        return $stmt->execute();
    }

    // Read all restaurants
    public function getAllRestaurants() {
        $sql = "SELECT * FROM restaurants";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update a restaurant
    public function updateRestaurant($id, $name, $place, $total_tables, $available_tables, $phone_number) {
        $sql = "UPDATE restaurants SET name = :name, place = :place, total_tables = :total_tables, 
                available_tables = :available_tables, phone_number = :phone_number WHERE restaurant_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':place', $place);
        $stmt->bindParam(':total_tables', $total_tables);
        $stmt->bindParam(':available_tables', $available_tables);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete a restaurant
    public function deleteRestaurant($id) {
        $sql = "DELETE FROM restaurants WHERE restaurant_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
