<?php
session_start();
include 'db_connection.php';

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch the order from the database using the order_id
    $stmt = $db->prepare("SELECT * FROM ordre WHERE id = ?");
    $stmt->execute([$order_id]);
    $order = $stmt->fetch();

    if ($order) {
        // Order found, display the details
        echo "<h1>Thank you for your order!</h1>";
        echo "<p>Your order ID is: " . htmlspecialchars($order['id']) . "</p>";
        echo "<p>Total Price: " . htmlspecialchars($order['total']) . " DT</p>";
        echo "<p>Customer Name: " . htmlspecialchars($order['customer_name']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($order['customer_email']) . "</p>";
        echo "<p>Shipping Address: " . htmlspecialchars($order['customer_address']) . "</p>";
        echo "<p>Status: " . htmlspecialchars($order['status']) . "</p>";
    } else {
        echo "Invalid order.";
    }
} else {
    echo "No order ID provided.";
}
?>
