<?php
require_once __DIR__ . '/../config/Database.php';  // Include database connection file

class User {
    private $conn;  // Database connection

    // Constructor to initialize the database connection
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Function to create a new user (for sign-up)
    public function createUser($table, $data) {
        /*
            $table: The table name (clients, deliverers, admins, restaurants)
            $data: An associative array with column names as keys and values as data
        */
    
        // Build a SQL query dynamically based on table and data
        $columns = implode(", ", array_keys($data));  // Convert keys to a comma-separated string
        $placeholders = ":" . implode(", :", array_keys($data));  // Create named placeholders
    
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    
        try {
            $stmt = $this->conn->prepare($sql);  // Prepare the query
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);  // Bind values to placeholders
            }
            return $stmt->execute();  // Execute the query
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
        if ($user->createUser($table, $data)) {
            echo "User registered successfully!";
            error_log("User registered: " . $name . " (" . $email . ")");
            header("Location: login.php");
            exit;
        } else {
            echo "Error registering user.";
            error_log("Registration failed for: " . $name . " (" . $email . ")");
        }
        
    }
    

    // Function to check user login
    public function loginUser($table, $email, $password) {
        /*
            $table: The table name (clients, deliverers, admins, restaurants)
            $email: The user's email
            $password: The user's input password
        */

        // Select the user by email
        $sql = "SELECT * FROM $table WHERE email = :email LIMIT 1";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":email", $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                return $user;  // Return user data if password matches
            } else {
                return false;  // Login failed
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function getUserByEmail($email) {
        try {
            $sql = "SELECT * FROM clients WHERE email = :email 
                    UNION 
                    SELECT * FROM deliverers WHERE email = :email 
                    UNION 
                    SELECT * FROM restaurants WHERE email = :email
                    UNION 
                    SELECT * FROM admins WHERE email = :email";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            // Fetch the user data
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
}
?>
