<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    try {
        $stmt = $db->prepare("DELETE FROM orders WHERE id = :id");
        $stmt->bindParam(':id', $orderId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: view_orders.php?message=Order deleted successfully");
            exit();
        } else {
            echo "Error deleting the order.";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "No order ID provided.";
}
?>
