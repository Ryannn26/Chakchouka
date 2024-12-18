<?php
require_once __DIR__ . '/../model/deliverer.php';

class DelivererController {
    private $delivererModel;

    public function __construct() {
        $this->delivererModel = new Deliverer();
    }

    // Handle Create
    public function createDeliverer($name, $phone_number) {
        if ($this->delivererModel->createDeliverer($name, $phone_number)) {
            echo "Deliverer added successfully!";
        } else {
            echo "Error adding deliverer.";
        }
    }

    // Handle Read
    public function listDeliverers() {
        return $this->delivererModel->getAllDeliverers();
    }

    // Handle Update
    public function updateDeliverer($id, $name, $phone_number) {
        if ($this->delivererModel->updateDeliverer($id, $name, $phone_number)) {
            echo "Deliverer updated successfully!";
        } else {
            echo "Error updating deliverer.";
        }
    }

    // Handle Delete
    public function deleteDeliverer($id) {
        if ($this->delivererModel->deleteDeliverer($id)) {
            echo "Deliverer deleted successfully!";
        } else {
            echo "Error deleting deliverer.";
        }
    }
}
?>
