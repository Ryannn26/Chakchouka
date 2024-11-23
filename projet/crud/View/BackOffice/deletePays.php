<?php
include '../../controller/PaysController.php';

// Create an instance of the PaysController
$paysController = new PaysController();

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the id of the country to delete
    $id_pays = $_GET['id'];

    // Call the deletePays method to delete the country
    $deleteSuccess = $paysController->deletePays($id_pays);

    // After deletion, redirect to the list page
    if ($deleteSuccess) {
        header('Location: paysList.php'); // Redirect to the pays list page after successful deletion
    } else {
        echo "Error deleting country."; // Display an error message if deletion fails
    }
} else {
    echo "Invalid ID."; // If no ID is provided, show an error message
}
?>
