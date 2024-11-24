<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Panier</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Votre Panier</h2>

    <?php
    if (!empty($_SESSION['cart'])) {
        echo '<table border="1" style="width: 100%; border-collapse: collapse;">
                <tr>
                    <th>Article</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>';
        $grand_total = 0;

        foreach ($_SESSION['cart'] as $id => $item) {
            $total = $item['price'] * $item['qty'];
            $grand_total += $total;

            echo "
                <tr>
                    <td>{$item['title']}</td>
                    <td>{$item['price']} DT</td>
                    <td>{$item['qty']}</td>
                    <td>{$total} DT</td>
                    <td><a href='remove_from_cart.php?id={$id}' style='color: red; text-decoration: none;'>Supprimer</a></td>
                </tr>";
        }

        echo "
            <tr>
                <td colspan='3' style='text-align: right;'><strong>Total Général</strong></td>
                <td><strong>{$grand_total} DT</strong></td>
                <td></td>
            </tr>
        </table>";
    } else {
        echo '<p>Votre panier est vide.</p>';
    }
    ?>

    <?php if (!empty($_SESSION['cart'])): ?>
        <!-- Formulaire des informations du client -->
        <form method="POST" action="place_ordre.php" style="margin-top: 20px;">
            <h1>INFORMATIONS DU CLIENT</h1>
            <br><input type="text" name="customer_name" placeholder="Votre Nom" required>
            <br><input type="text" name="customer_contact" placeholder="Votre Numéro de Contact" required>
            <br><input type="email" name="customer_email" placeholder="Votre Email" required>
            <br><textarea name="customer_address" placeholder="Votre Adresse" required></textarea>
            <br><input type="hidden" name="total_price" value="<?php echo $grand_total; ?>"> <!-- Pass the total price -->
            <br>
            <!-- Continue Shopping Button -->
            <a href="index.php" class="btn btn-secondary" style="text-decoration: none; background-color: #28a745; color: white; padding: 10px 20px; border-radius: 5px;">Continuer vos achats</a>
            <!-- Passer la commande Button -->
            <button type="submit" class="btn btn-primary" style="margin-left: 10px; padding: 10px 20px;">Passer la commande</button>
        </form>
    <?php endif; ?>
</body>
</html>
