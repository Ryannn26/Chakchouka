<?php
session_start();
include 'db_connection.php'; // Make sure this file contains your database connection


// Fetch orders from the database
$query = $db->query("SELECT * FROM orders ORDER BY date DESC"); // You can adjust the query as needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>Update food </title>
    
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders - BackOffice</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>Orders List</h2>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Total Price</th>
                    <th>Date</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any orders
                if ($query->rowCount() > 0) {
                    while ($order = $query->fetch()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($order['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($order['customer_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($order['customer_email']) . "</td>";
                        echo "<td>" . htmlspecialchars($order['customer_address']) . "</td>";
                        echo "<td>" . htmlspecialchars($order['total']) . " DT</td>";
                        echo "<td>" . htmlspecialchars($order['date']) . "</td>";
                        echo "<td>" . htmlspecialchars($order['status']) . "</td>";
                       
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No orders found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 CHAKCHOUKA's Marketplace</p>
    </footer>
</body>
</html>
