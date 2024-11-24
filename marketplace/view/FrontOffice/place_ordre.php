<?php
session_start();

// Check if cart is empty
if (empty($_SESSION['cart'])) {
    die("Erreur : Votre panier est vide.");
}

// Database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve customer information
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];
    $total_price = $_POST['total_price'];

    try {
        // Insert order into 'orders' table
        $stmt = $db->prepare("
            INSERT INTO orders (customer_name, customer_contact, customer_email, customer_address, total, date, status)
            VALUES (?, ?, ?, ?, ?, NOW(), 'pending')
        ");
        $stmt->execute([$customer_name, $customer_contact, $customer_email, $customer_address, $total_price]);
        $order_id = $db->lastInsertId();

        // Insert items into 'order_items' table
        $stmt_items = $db->prepare("
            INSERT INTO order_items (order_id, food_id, quantity, price, subtotal)
            VALUES (?, ?, ?, ?, ?)
        ");

        foreach ($_SESSION['cart'] as $food_id => $item) {
            $quantity = $item['qty'];
            $price = $item['price'];
            $subtotal = $price * $quantity;
            $stmt_items->execute([$order_id, $food_id, $quantity, $price, $subtotal]);
        }

        // Clear the cart
        unset($_SESSION['cart']);
        echo "Order placed successfully: " ;
        exit();  // Make sure the redirection happens immediately after this.
        // Redirect to confirmation page
        header("Location: confirmation.php?order_id=$order_id");
        exit();
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Erreur : Méthode non autorisée.";
}
?>
