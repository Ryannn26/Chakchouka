<?php
session_start();

// Check if the "id" parameter is present in the URL
if (isset($_GET['id'])) {
    $food_id = $_GET['id'];

    // Check if the cart is already initialized in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Database connection
    include 'db_connection.php';

    try {
        // Fetch the food item from the database
        $stmt = $db->prepare("SELECT * FROM food WHERE id = ?");
        $stmt->execute([$food_id]);
        $food = $stmt->fetch();

        if ($food) {
            // Check if the item is already in the cart
            if (isset($_SESSION['cart'][$food_id])) {
                // Increment quantity if it exists
                $_SESSION['cart'][$food_id]['qty'] += 1;
            } else {
                // Add the new item to the cart
                $_SESSION['cart'][$food_id] = [
                    'title' => $food['title'],
                    'price' => $food['price'],
                    'qty' => 1
                ];
            }
            echo "<script>alert('Article ajouté au panier !');</script>";
        } else {
            echo "<script>alert('Article non trouvé.');</script>";
        }
    } catch (Exception $e) {
        echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section -->
    <section class="navbar" style="background-color: #002347;">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <h1>CHAKCHOUKA'S Market Place</h1>
                </a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#food-menu">Foods</a></li>
                    <li><a href="#footer">Contact</a></li>
                    <li><a href="view_cart.php">Panier</a></li>
                    <li><a href="../BackOffice/food.php">Dashboard</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>

    <!-- Food Menu Section -->
    <section class="food-menu" id="food-menu">
        <div class="container">
            <h2 class="text-center">MarketPlace</h2>

            <?php
            // Database connection
            include 'db_connection.php';

            try {
                // Fetch food items from the database
                $query = $db->query("SELECT * FROM food");
                while ($food = $query->fetch()) {
                    echo '
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="images/' . htmlspecialchars($food['image']) . '" 
                                    alt="' . htmlspecialchars($food['title']) . '" 
                                    class="img-responsive img-curve">
                            </div>
                            <div class="food-menu-desc">
                                <h4>' . htmlspecialchars($food['title']) . '</h4>
                                <p class="food-price">' . htmlspecialchars($food['price']) . ' DT</p>
                                <br>
                                <a href="index.php?id=' . htmlspecialchars($food['id']) . '" class="btn btn-primary">Ajouter</a>
                            </div>
                        </div>';
                }
            } catch (Exception $e) {
                echo '<p style="color: red;">Erreur : ' . $e->getMessage() . '</p>';
            }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>

    <!-- Footer Section -->
    <section class="footer" id="footer" style="background-color: #002347;">
        <div class="container text-center">
            <p style="color: white;">CHAKCHOUKA</p>
            <p style="color: white;">
                Contactez-nous<br>
                📧 Email: support@chakchouka.com<br>
                📞 Téléphone: +216 22 222 222<br>
                📍 Adresse: 123 Ghazela, Tunis
            </p>
        </div>
    </section>
</body>
</html>
