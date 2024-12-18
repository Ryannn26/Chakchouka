<?php
require_once __DIR__ . '/../model/client.php';

class ClientController {
    private $clientModel;

    public function __construct() {
        $this->clientModel = new Client();
    }

    // Handle Create
    public function createClient($name, $phone_number) {
        if ($this->clientModel->createClient($name, $phone_number)) {
            echo "Client added successfully!";
        } else {
            echo "Error adding client.";
        }
    }

    // Handle Read
    public function listClients() {
        return $this->clientModel->getAllClients();
    }

    // Handle Update
    public function updateClient($id, $name, $phone_number) {
        if ($this->clientModel->updateClient($id, $name, $phone_number)) {
            echo "Client updated successfully!";
        } else {
            echo "Error updating client.";
        }
    }

    // Handle Delete
    public function deleteClient($id) {
        if ($this->clientModel->deleteClient($id)) {
            echo "Client deleted successfully!";
        } else {
            echo "Error deleting client.";
        }
    }
}
?>
