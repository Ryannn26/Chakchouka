<?php
session_start();

// Get food item ID from the request
if (isset($_GET['id'])) {
    $food_id = $_GET['id'];

    // Database connection
    include 'db_connection.php';

    try {
        // Fetch the food item details
        $stmt = $db->prepare("SELECT id, title, price FROM food WHERE id = ?");
        $stmt->execute([$food_id]);
        $food = $stmt->fetch();

        if ($food) {
            // Initialize cart if not already
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Check if the item already exists in the cart
            if (isset($_SESSION['cart'][$food_id])) {
                // Increase the quantity
                $_SESSION['cart'][$food_id]['qty'] += 1;
            } else {
                // Add the item to the cart
                $_SESSION['cart'][$food_id] = [
                    'title' => $food['title'],
                    'price' => $food['price'],
                    'qty' => 1
                ];
            }

            // Redirect to view_cart.php
            header("Location: view_cart.php");
        } else {
            echo "Error: Food item not found.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: No food item specified.";
}
?>
