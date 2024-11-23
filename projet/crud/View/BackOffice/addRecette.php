<?php
include '../../controller/RecetteController.php';
include '../../controller/PlatsController.php';

$error = "";
$recette = null;

$RecetteController = new RecetteController();
$PlatsController = new PlatsController();

// Fetch plats for the dropdown
$platsList = $PlatsController->getAllPlats();

if (
    isset($_POST["titre"], $_POST["ingredients"], $_POST["video_url"], $_POST["id_plats"]) &&
    !empty($_POST["titre"]) && !empty($_POST["ingredients"]) &&
    !empty($_POST["video_url"]) && !empty($_POST["id_plats"])
) {
    // Validate id_plats exists in plats table
    if (!in_array($_POST['id_plats'], array_column($platsList, 'id_plats'))) {
        $error = "Invalid dish selected.";
    } else {
        $recette = new Recette(
            null,
            $_POST['titre'],
            $_POST['ingredients'],
            $_POST['video_url'],
            (int) $_POST['id_plats']
        );

        $RecetteController->addRecette($recette);
        header('Location: recetteList.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Add a Recipe</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="titre">Recipe Title:</label>
            <input type="text" id="titre" name="titre" class="form-control" required>
            <label for="ingredients">Ingredients:</label>
            <input type="text" id="ingredients" name="ingredients" class="form-control" required>
            <label for="video_url">Video URL:</label>
            <input type="url" id="video_url" name="video_url" class="form-control" required>
            <label for="id_plats">Select a Dish:</label>
            <select id="id_plats" name="id_plats" class="form-control" required>
                <option value="" disabled selected>Select a dish</option>
                <?php foreach ($platsList as $plat): ?>
                    <option value="<?= $plat['id_plats'] ?>"><?= htmlspecialchars($plat['nom_plats']) ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary mt-3">Add Recipe</button>
        </form>
    </div>
</body>

</html>
