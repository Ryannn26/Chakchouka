<?php
// Include the Pays model
include_once '../../model/Pays.php';

class PaysController {

    // Function to add a new country (pays)
    public function addPays(Pays $pays) {
        // Get the database connection
        $db = $this->getDatabaseConnection();
        
        // Prepare the SQL query to insert the country
        $query = 'INSERT INTO pays (nom_pays, code_iso, population) VALUES (?, ?, ?)';
        
        // Prepare the statement
        $stmt = $db->prepare($query);
        
        // Bind parameters
        $stmt->bind_param(
            'sis', // s = string, i = integer
            $pays->getNomPays(),
            $pays->getCodeIso(),
            $pays->getPopulation()
        );
        
        // Execute the query
        if ($stmt->execute()) {
            return true; // Success
        } else {
            return false; // Failure
        }
    }

    // Function to update an existing country (pays)
    public function updatePays(Pays $pays) {
        // Get the database connection
        $db = $this->getDatabaseConnection();
        
        // Prepare the SQL query to update the country
        $query = 'UPDATE pays SET nom_pays = ?, code_iso = ?, population = ? WHERE id_pays = ?';
        
        // Prepare the statement
        $stmt = $db->prepare($query);
        
        // Bind parameters
        $stmt->bind_param(
            'sisi', // s = string, i = integer
            $pays->getNomPays(),
            $pays->getCodeIso(),
            $pays->getPopulation(),
            $pays->getIdPays()
        );
        
        // Execute the query
        if ($stmt->execute()) {
            return true; // Success
        } else {
            return false; // Failure
        }
    }

    // Function to delete a country (pays)
    public function deletePays($id_pays) {
        // Get the database connection
        $db = $this->getDatabaseConnection();
        
        // Prepare the SQL query to delete the country
        $query = 'DELETE FROM pays WHERE id_pays = ?';
        
        // Prepare the statement
        $stmt = $db->prepare($query);
        
        // Bind parameters
        $stmt->bind_param('i', $id_pays); // i = integer
        
        // Execute the query
        if ($stmt->execute()) {
            return true; // Success
        } else {
            return false; // Failure
        }
    }

    // Function to fetch all countries (pays)
    public function getPaysList() {
        // Get the database connection
        $db = $this->getDatabaseConnection();
        
        // Prepare the SQL query to fetch all countries
        $query = 'SELECT * FROM pays';
        
        // Execute the query
        $result = $db->query($query);
        
        // Fetch all rows
        $paysList = [];
        while ($row = $result->fetch_assoc()) {
            $paysList[] = $row;
        }
        
        return $paysList;
    }

    // Function to fetch a country by ID
    public function getPaysById($id_pays) {
        // Get the database connection
        $db = $this->getDatabaseConnection();
        
        // Prepare the SQL query to fetch a specific country by ID
        $query = 'SELECT * FROM pays WHERE id_pays = ?';
        
        // Prepare the statement
        $stmt = $db->prepare($query);
        
        // Bind parameters
        $stmt->bind_param('i', $id_pays);
        
        // Execute the query
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        
        // Fetch the row
        $pays = $result->fetch_assoc();
        
        return $pays;
    }

    // Function to get the database connection
    private function getDatabaseConnection() {
        // Change these values according to your database configuration
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'chakchouka1';
        
        // Create the connection
        $db = new mysqli($host, $username, $password, $database);
        
        // Check the connection
        if ($db->connect_error) {
            die('Connection failed: ' . $db->connect_error);
        }
        
        return $db;
    }
}
?>
