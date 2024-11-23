<?php
include '../../controller/RecetteController.php';

$error = "";
$recette = null;

// Create an instance of the controller
$recetteController = new RecetteController();

if (isset($_POST["titre"], $_POST["ingredients"], $_POST["video_url"], $_POST["id_recette"], $_POST["id_plats"])) {
    if (
        !empty($_POST["titre"]) &&
        !empty($_POST["ingredients"]) &&
        !empty($_POST["video_url"]) &&
        !empty($_POST["id_recette"]) &&
        !empty($_POST["id_plats"]) // Ensure id_plats is filled
    ) {
        // Create a Recette object with all fields, including id_recette and id_plats
        $recette = new Recette(
            $_POST['id_recette'],  // Pass the id_recette from the form
            $_POST['titre'],
            $_POST['ingredients'],
            $_POST['video_url'],
            $_POST['id_plats']  // Use id_plats from the form
        );

        // Call the updateRecette method
        if ($recetteController->updateRecette($recette)) {
            // Redirect to recette list if update is successful
            header('Location: recetteList.php');
            exit();
        } else {
            $error = "Failed to update the recipe.";
        }
    } else {
        $error = "Missing information.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Recipe - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar and content omitted for brevity -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update the Recipe with ID = <?php echo $_POST['id'] ?? ''; ?> </h1>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <?php
                                        if (isset($_POST['id'])) {
                                            // Use getRecetteById to fetch the recipe details based on the ID
                                            $recette = $recetteController->getRecetteById($_POST['id']);
                                        ?>
                                        <form id="updateRecetteForm" action="" method="POST">
                                            <input type="hidden" id="id_recette" name="id_recette" value="<?php echo $recette['id_recette']; ?>">

                                            <label for="titre">Recipe Title:</label><br>
                                            <input class="form-control form-control-user" type="text" id="titre" name="titre" value="<?php echo $recette['titre']; ?>" required>

                                            <label for="ingredients">Ingredients:</label><br>
                                            <input class="form-control form-control-user" type="text" id="ingredients" name="ingredients" value="<?php echo $recette['ingredients']; ?>" required>

                                            <label for="video_url">Video URL:</label><br>
                                            <input class="form-control form-control-user" type="text" id="video_url" name="video_url" value="<?php echo $recette['video_url']; ?>" required>

                                            <!-- Add a field for id_plats -->
                                            <label for="id_plats">Plat ID:</label><br>
                                            <input class="form-control form-control-user" type="text" id="id_plats" name="id_plats" value="<?php echo $recette['id_plats']; ?>" required>

                                            <span id="zone_error" style="color: red;"><?php echo $error; ?></span><br>

                                            <button type="submit" class="btn btn-primary btn-user btn-block">Update Recipe</button>
                                        </form>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Travel Booking 2024</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="js/addOffer.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>
