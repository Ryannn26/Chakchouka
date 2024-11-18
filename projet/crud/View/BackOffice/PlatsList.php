<?php
include '../../controller/PlatsController.php';  // Include the PlatsController to get the list of Plats

$platsController = new PlatsController();  // Create an instance of PlatsController
$list = $platsController->getAllPlats();  // Get the list of Plats from the controller
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Dish List - Dashboard</title>
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
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
                    <div class="sidebar-brand-text mx-3">Travel Booking <sup></sup></div>
                </a>
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="addPlats.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Add Dish</span></a>
                </li>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dish List</h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Dish Name</th>
                                                        <th>Description</th>
                                                        <th>Image URL</th>
                                                        <th colspan="2">Actions</th>
                                                    </tr>

                                                    <?php
                                                    foreach ($list as $plats) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $plats['id_plats']; ?></td>
                                                            <td><?= $plats['nom_plats']; ?></td>
                                                            <td><?= $plats['description']; ?></td>
                                                            <td><?= $plats['image_url']; ?></td>
                                                            <td align="center">
                                                                <form method="POST" action="updatePlats.php">
                                                                    <input type="submit" name="update" value="Update">
                                                                    <input type="hidden" value="<?= $plats['id_plats']; ?>" name="id">
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <a href="deletePlats.php?id=<?= $plats['id_plats']; ?>">Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Page Content -->
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

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>
