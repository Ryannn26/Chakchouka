<?php
require_once __DIR__ . '/../controller/deliverercontroller.php';
$delivererController = new DelivererController();

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'create') {
            $delivererController->createDeliverer($_POST['name'], $_POST['phone_number']);
        } elseif ($_POST['action'] === 'update') {
            $delivererController->updateDeliverer($_POST['id'], $_POST['name'], $_POST['phone_number']);
        } elseif ($_POST['action'] === 'delete') {
            $delivererController->deleteDeliverer($_POST['id']);
        }
    }
}

// Fetch deliverers
$deliverers = $delivererController->listDeliverers();
?>

<h2>Deliverers Management</h2>

<!-- Create Deliverer -->
<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="phone_number" placeholder="Phone Number" required>
    <input type="hidden" name="action" value="create">
    <button type="submit">Add Deliverer</button>
</form>

<!-- List Deliverers -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($deliverers as $deliverer): ?>
        <tr>
            <td><?= $deliverer['deliverer_id'] ?></td>
            <td><?= $deliverer['name'] ?></td>
            <td><?= $deliverer['phone_number'] ?></td>
            <td>
                <!-- Update Form -->
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $deliverer['deliverer_id'] ?>">
                    <input type="text" name="name" value="<?= $deliverer['name'] ?>" required>
                    <input type="text" name="phone_number" value="<?= $deliverer['phone_number'] ?>" required>
                    <input type="hidden" name="action" value="update">
                    <button type="submit">Update</button>
                </form>
                <!-- Delete Form -->
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $deliverer['deliverer_id'] ?>">
                    <input type="hidden" name="action" value="delete">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
