<?php
session_start();

if (isset($_GET['id'])) {
    $food_id = $_GET['id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    include 'db_connection.php';

    try {
        $stmt = $db->prepare("SELECT * FROM food WHERE id = ?");
        $stmt->execute([$food_id]);
        $food = $stmt->fetch();

        if ($food) {
            if (isset($_SESSION['cart'][$food_id])) {
                $_SESSION['cart'][$food_id]['qty'] += 1;
            } else {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="font-size: 1.8rem; font-weight: bold; color:#ff9800;">Chakchouka's MarketPlace</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#food-menu">Marketplace</a></li>
                    <li class="nav-item"><a class="nav-link" href="#food-menu">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="view_cart.php">Panier</a></li>
                    <li class="nav-item"><a class="nav-link" href="../BackOffice/food.php">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Food Menu Section -->
    <section class="food-menu" id="food-menu">
        <div class="container">
            <!-- Search and Sort Form -->
            <form class="d-flex" method="GET" action="index.php" style="margin-bottom: 20px;">
                <input class="form-control me-2" type="search" name="query" placeholder="Rechercher" aria-label="Search" 
                       value="<?= isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
                <select name="sort" class="form-select me-2" style="max-width: 200px;">
                    <option value="">Trier par</option>
                    <option value="price_asc" <?= isset($_GET['sort']) && $_GET['sort'] == 'price_asc' ? 'selected' : ''; ?>>Prix croissant</option>
                    <option value="price_desc" <?= isset($_GET['sort']) && $_GET['sort'] == 'price_desc' ? 'selected' : ''; ?>>Prix décroissant</option>
                    <option value="title_asc" <?= isset($_GET['sort']) && $_GET['sort'] == 'title_asc' ? 'selected' : ''; ?>>Titre (A-Z)</option>
                    <option value="title_desc" <?= isset($_GET['sort']) && $_GET['sort'] == 'title_desc' ? 'selected' : ''; ?>>Titre (Z-A)</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Appliquer</button>
                <a href="index.php" class="btn btn-secondary">Clear</a>
            </form>

            <?php
            include 'db_connection.php';

            try {
                $query = "SELECT * FROM food";
                $params = [];

                // Add search filter if a query is provided
                if (isset($_GET['query']) && !empty($_GET['query'])) {
                    $query .= " WHERE title LIKE ?";
                    $params[] = "%" . htmlspecialchars($_GET['query']) . "%";
                }

                // Add sorting logic
                if (isset($_GET['sort'])) {
                    if ($_GET['sort'] == 'price_asc') {
                        $query .= " ORDER BY price ASC";
                    } elseif ($_GET['sort'] == 'price_desc') {
                        $query .= " ORDER BY price DESC";
                    } elseif ($_GET['sort'] == 'title_asc') {
                        $query .= " ORDER BY title ASC";
                    } elseif ($_GET['sort'] == 'title_desc') {
                        $query .= " ORDER BY title DESC";
                    }
                }

                $stmt = $db->prepare($query);
                $stmt->execute($params);

                if ($stmt->rowCount() == 0) {
                    echo '<p style="color: red; text-align: center;">Aucun article trouvé pour votre recherche.</p>';
                }

                while ($food = $stmt->fetch()) {
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
    <section class="footer" id="footer" style="background-color:#343a40;">
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
