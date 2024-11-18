<?php
include '../../controller/RecetteController.php';

// Create an instance of the RecetteController
$recetteController = new RecetteController();

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the id of the recipe to delete
    $id_recette = $_GET['id'];

    // Call the deleteRecette method to delete the recipe
    $deleteSuccess = $recetteController->deleteRecette($id_recette);

    // After deletion, redirect to the list page
    if ($deleteSuccess) {
        header('Location: recetteList.php'); // Redirect to the recette list page after successful deletion
    } else {
        echo "Error deleting recipe."; // Display an error message if deletion fails
    }
} else {
    echo "Invalid ID."; // If no ID is provided, show an error message
}
?>
