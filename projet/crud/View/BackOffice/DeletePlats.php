<?php
include '../../controller/PlatsController.php';

// Create an instance of the PlatsController
$platsController = new PlatsController();

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the id of the dish to delete
    $id_plats = $_GET['id'];

    // Call the deletePlats method to delete the dish
    $deleteSuccess = $platsController->deletePlats($id_plats);

    // After deletion, redirect to the list page
    if ($deleteSuccess) {
        header('Location: platsList.php'); // Redirect to the plats list page after successful deletion
    } else {
        echo "Error deleting dish."; // Display an error message if deletion fails
    }
} else {
    echo "Invalid ID."; // If no ID is provided, show an error message
}
?>
