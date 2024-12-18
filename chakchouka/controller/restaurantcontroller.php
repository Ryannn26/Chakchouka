<?php
require_once __DIR__ . '/../model/restaurant.php';

class RestaurantController {
    private $restaurantModel;

    public function __construct() {
        $this->restaurantModel = new Restaurant();
    }

    // Handle Create
    public function createRestaurant($name, $place, $total_tables, $available_tables, $phone_number) {
        if ($this->restaurantModel->createRestaurant($name, $place, $total_tables, $available_tables, $phone_number)) {
            echo "Restaurant added successfully!";
        } else {
            echo "Error adding restaurant.";
        }
    }

    // Handle Read
    public function listRestaurants() {
        return $this->restaurantModel->getAllRestaurants();
    }

    // Handle Update
    public function updateRestaurant($id, $name, $place, $total_tables, $available_tables, $phone_number) {
        if ($this->restaurantModel->updateRestaurant($id, $name, $place, $total_tables, $available_tables, $phone_number)) {
            echo "Restaurant updated successfully!";
        } else {
            echo "Error updating restaurant.";
        }
    }

    // Handle Delete
    public function deleteRestaurant($id) {
        if ($this->restaurantModel->deleteRestaurant($id)) {
            echo "Restaurant deleted successfully!";
        } else {
            echo "Error deleting restaurant.";
        }
    }
}
?>
