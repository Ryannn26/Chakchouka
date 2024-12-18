<?php
require_once __DIR__ . '/../config/Database.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'] ?? null;
    $pseudo = $_POST['pseudo'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $phone_number = $_POST['phone_number'] ?? null;
    $role = $_POST['role'] ?? null;

    // Debug: Check if any fields are missing
    if (!$name || !$pseudo || !$email || !$password || !$phone_number || !$role) {
        echo "All fields are required!";
        exit; // Stop execution if fields are missing
    }

    // Validate the role
    if (!in_array($role, ['client', 'deliverer', 'restaurant'])) {
        echo 'Invalid role selected.';
        exit;
    }

    // Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Database connection
    $database = new Database();
    $conn = $database->connect();

    // Table mapping based on the role selected
    $table_map = [
        'client' => 'clients',
        'deliverer' => 'deliverers',
        'restaurant' => 'restaurants'
    ];

    // Ensure the table exists based on the selected role
    if (!isset($table_map[$role])) {
        echo 'Invalid role selected.';
        exit;
    }

    $table = $table_map[$role]; // Get the correct table name (plural)

    // Prepare SQL query to insert data into the correct table
    $sql = "INSERT INTO $table (name, pseudo, email, password, phone_number) 
            VALUES (:name, :pseudo, :email, :password, :phone_number)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone_number', $phone_number);

    // Try to execute the query
    try {
        $stmt->execute();
        echo 'User registered successfully!';
    } catch (PDOException $e) {
        echo 'Error registering user: ' . $e->getMessage();
    }
}
?>
