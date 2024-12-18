<?php
class Database {
    private $host = 'localhost';  // Database host
    private $db_name = 'chakchouka';  // Database name
    private $username = 'root';  // Your database username
    private $password = '';  // Your database password
    public $conn;

    // Function to establish a connection
    public function connect() {
        $this->conn = null;

        try {
            // PDO connection string
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
