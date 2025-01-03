<?php
include '../../controller/PlatsController.php';
include '../../controller/PaysController.php'; // Include PaysController to fetch countries

$error = "";
$plats = null;

// Create instances of the controllers
$PlatsController = new PlatsController();
$PaysController = new PaysController();

// Fetch all pays to populate the dropdown
$paysList = $PaysController->getPaysList(); // Corrected method to fetch pays list

if (
    isset($_POST["nom_plats"]) && isset($_POST["description"]) && 
    isset($_POST["image_url"]) && isset($_POST["id_pays"])
) {
    if (
        !empty($_POST["nom_plats"]) && !empty($_POST["description"]) && 
        !empty($_POST["image_url"]) && !empty($_POST["id_pays"])
    ) {
        // Ensure id_pays is a valid integer
        $id_pays = (int)$_POST['id_pays'];

        // Check if id_pays exists in the database
        $isValidPays = false;
        foreach ($paysList as $pays) {
            if ($pays['id_pays'] == $id_pays) {
                $isValidPays = true;
                break;
            }
        }

        if ($isValidPays) {
            // Create and add the plats to the database
            $plats = new Plats(
                null,  // The ID will be auto-incremented by the database
                $_POST['nom_plats'],
                $_POST['description'],
                $_POST['image_url'],
                $id_pays
            );

            // Add the plats to the database
            $PlatsController->addPlats($plats);

            // Redirect to the plats list page
            header('Location: platsList.php');
            exit();
        } else {
            $error = "Invalid country selected.";
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

    <title>Add Dish - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Dish Management</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="platsList.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dish List</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add a Dish</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Form Card -->
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <form id="addPlatsForm" action="" method="POST">
                                            <label for="nom_plats">Dish Name:</label><br>
                                            <input class="form-control form-control-user" type="text" id="nom_plats" name="nom_plats" required>
                                            <span id="nom_plats_error"></span><br>

                                            <label for="description">Description:</label><br>
                                            <input class="form-control form-control-user" type="text" id="description" name="description" required>
                                            <span id="description_error"></span><br>

                                            <label for="image_url">Image URL:</label><br>
                                            <input class="form-control form-control-user" type="url" id="image_url" name="image_url" required>
                                            <span id="image_url_error"></span><br>

                                            <label for="id_pays">Country:</label><br>
                                            <select class="form-control" id="id_pays" name="id_pays" required>
                                                <option value="" disabled selected>Select a country</option>
                                                <?php foreach ($paysList as $pays): ?>
                                                    <option value="<?= $pays['id_pays']; ?>"><?= htmlspecialchars($pays['nom_pays']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span id="id_pays_error"></span><br>

                                            <button type="submit" class="btn btn-primary btn-user btn-block">Add Dish</button>
                                        </form>
                                        <?php if ($error): ?>
                                            <div class="alert alert-danger mt-3">
                                                <?= htmlspecialchars($error); ?>
                                            </div>
                                        <?php endif; ?>
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
                        <span>Copyright &copy; Dish Management 2024</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="js/addPlats.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
