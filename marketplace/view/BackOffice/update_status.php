<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    try {
        // Change status logic (e.g., toggle between statuses or set to a new one)
        $stmt = $db->prepare("UPDATE orders SET status = 'Completed' WHERE id = :id");
        $stmt->bindParam(':id', $orderId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: view_orders.php?message=Order status updated successfully");
            exit();
        } else {
            echo "Error updating order status.";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "No order ID provided.";
}
?>
