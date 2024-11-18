<?php
include '../../controller/PlatsController.php';

$error = "";
$plats = null;

// Create an instance of the controller
$platsController = new PlatsController();

if (isset($_POST["nom_plats"], $_POST["description"], $_POST["image_url"], $_POST["id_plats"], $_POST["id_pays"])) {
    if (
        !empty($_POST["nom_plats"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["image_url"]) &&
        !empty($_POST["id_plats"]) &&
        !empty($_POST["id_pays"]) // Ensure id_pays is filled
    ) {
        // Create a Plats object with all fields, including id_plats and id_pays
        $plats = new Plats(
            $_POST['id_plats'],  // Pass the id_plats from the form
            $_POST['nom_plats'],
            $_POST['description'],
            $_POST['image_url'],
            $_POST['id_pays']  // Use id_pays from the form
        );

        // Call the updatePlats method
        if ($platsController->updatePlats($plats)) {
            // Redirect to plats list if update is successful
            header('Location: platsList.php');
            exit();
        } else {
            $error = "Failed to update the dish.";
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

    <title>Update Dish - Dashboard</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Update the Dish with ID = <?php echo $_POST['id'] ?? ''; ?> </h1>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <?php
                                        if (isset($_POST['id'])) {
                                            // Use getPlatsById to fetch the dish details based on the ID
                                            $plats = $platsController->getPlatsById($_POST['id']);
                                        ?>
                                        <form id="updatePlatsForm" action="" method="POST">
                                            <input type="hidden" id="id_plats" name="id_plats" value="<?php echo $plats['id_plats']; ?>">

                                            <label for="nom_plats">Dish Name:</label><br>
                                            <input class="form-control form-control-user" type="text" id="nom_plats" name="nom_plats" value="<?php echo $plats['nom_plats']; ?>" required>

                                            <label for="description">Description:</label><br>
                                            <input class="form-control form-control-user" type="text" id="description" name="description" value="<?php echo $plats['description']; ?>" required>

                                            <label for="image_url">Image URL:</label><br>
                                            <input class="form-control form-control-user" type="text" id="image_url" name="image_url" value="<?php echo $plats['image_url']; ?>" required>

                                            <!-- Add a field for id_pays -->
                                            <label for="id_pays">Country ID:</label><br>
                                            <input class="form-control form-control-user" type="text" id="id_pays" name="id_pays" value="<?php echo $plats['id_pays']; ?>" required>

                                            <span id="zone_error" style="color: red;"><?php echo $error; ?></span><br>

                                            <button type="submit" class="btn btn-primary btn-user btn-block">Update Dish</button>
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
