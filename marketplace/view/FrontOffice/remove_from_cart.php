<?php
session_start();

// Check if the food ID is passed in the URL
if (isset($_GET['id'])) {
    $food_id = $_GET['id'];

    // Check if the cart exists and the item is in the cart
    if (isset($_SESSION['cart'][$food_id])) {
        // Remove the item from the cart
        unset($_SESSION['cart'][$food_id]);

        // Redirect to the cart page with a success message
        header("Location: view_cart.php?message=Item removed successfully");
    } else {
        // Redirect with an error message if the item is not in the cart
        header("Location: view_cart.php?error=Item not found in cart");
    }
} else {
    // Redirect with an error message if no item ID is provided
    header("Location: view_cart.php?error=No item specified");
}
