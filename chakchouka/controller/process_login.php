<?php
// Start session to manage login state
session_start();

// Include the User.php model
require_once '../model/User.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate inputs
    if (empty($email) || empty($password)) {
        echo "Both fields are required.";
        exit;
    }

    // Create an instance of User class
    $user = new User();

    // Authenticate user
    $userData = $user->getUserByEmail($email);

    if ($userData) {
        // Verify the password
        if (password_verify($password, $userData['password'])) {
            // Store user data in session
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['role'] = $userData['role']; // Optional: Store user role

            // Redirect user based on role (optional)
            switch ($userData['role']) {
                case 'admin':
                    header("Location: ../view/admin_dashboard.php");
                    break;
                case 'deliverer':
                    header("Location: ../view/deliverer_dashboard.php");
                    break;
                case 'client':
                default:
                    header("Location: ../view/client_dashboard.php");
                    break;
            }
            exit;
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Invalid request.";
}
?>
