<?php
require_once __DIR__ . '/../controller/clientcontroller.php';
$clientController = new ClientController();

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'create') {
            $clientController->createClient($_POST['name'], $_POST['phone_number']);
        } elseif ($_POST['action'] === 'update') {
            $clientController->updateClient($_POST['id'], $_POST['name'], $_POST['phone_number']);
        } elseif ($_POST['action'] === 'delete') {
            $clientController->deleteClient($_POST['id']);
        }
    }
}

// Fetch clients
$clients = $clientController->listClients();
?>

<h2>Clients Management</h2>

<!-- Create Client -->
<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="phone_number" placeholder="Phone Number" required>
    <input type="hidden" name="action" value="create">
    <button type="submit">Add Client</button>
</form>

<!-- List Clients -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= $client['client_id'] ?></td>
            <td><?= $client['name'] ?></td>
            <td><?= $client['phone_number'] ?></td>
            <td>
                <!-- Update Form -->
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $client['client_id'] ?>">
                    <input type="text" name="name" value="<?= $client['name'] ?>" required>
                    <input type="text" name="phone_number" value="<?= $client['phone_number'] ?>" required>
                    <input type="hidden" name="action" value="update">
                    <button type="submit">Update</button>
                </form>
                <!-- Delete Form -->
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $client['client_id'] ?>">
                    <input type="hidden" name="action" value="delete">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
