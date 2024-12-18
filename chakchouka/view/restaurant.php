<?php
require_once __DIR__ . '/../controller/restaurantcontroller.php';
$restaurantController = new RestaurantController();

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'create') {
            $restaurantController->createRestaurant($_POST['name'], $_POST['place'], $_POST['total_tables'], $_POST['available_tables'], $_POST['phone_number']);
        } elseif ($_POST['action'] === 'update') {
            $restaurantController->updateRestaurant($_POST['id'], $_POST['name'], $_POST['place'], $_POST['total_tables'], $_POST['available_tables'], $_POST['phone_number']);
        } elseif ($_POST['action'] === 'delete') {
            $restaurantController->deleteRestaurant($_POST['id']);
        }
    }
}

// Fetch restaurants
$restaurants = $restaurantController->listRestaurants();
?>

<h2>Restaurants Management</h2>

<!-- Create Restaurant -->
<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="place" placeholder="Place" required>
    <input type="number" name="total_tables" placeholder="Total Tables" required>
    <input type="number" name="available_tables" placeholder="Available Tables" required>
    <input type="text" name="phone_number" placeholder="Phone Number" required>
    <input type="hidden" name="action" value="create">
    <button type="submit">Add Restaurant</button>
</form>

<!-- List Restaurants -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Place</th>
        <th>Total Tables</th>
        <th>Available Tables</th>
        <th>Phone Number</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($restaurants as $restaurant): ?>
        <tr>
            <td><?= $restaurant['restaurant_id'] ?></td>
            <td><?= $restaurant['name'] ?></td>
            <td><?= $restaurant['place'] ?></td>
            <td><?= $restaurant['total_tables'] ?></td>
            <td><?= $restaurant['available_tables'] ?></td>
            <td><?= $restaurant['phone_number'] ?></td>
            <td>
                <!-- Update Form -->
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $restaurant['restaurant_id'] ?>">
                    <input type="text" name="name" value="<?= $restaurant['name'] ?>" required>
                    <input type="text" name="place" value="<?= $restaurant['place'] ?>" required>
                    <input type="number" name="total_tables" value="<?= $restaurant['total_tables'] ?>" required>
                    <input type="number" name="available_tables" value="<?= $restaurant['available_tables'] ?>" required>
                    <input type="text" name="phone_number" value="<?= $restaurant['phone_number'] ?>" required>
                    <input type="hidden" name="action" value="update">
                    <button type="submit">Update</button>
                </form>
                <!-- Delete Form -->
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $restaurant['restaurant_id'] ?>">
                    <input type="hidden" name="action" value="delete">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
