<?php

include '../../controller/foodcontroller.php';

$error = "";
$food = null;

// Create an instance of the controller
$foodController = new foodcontroller();

if (
    isset($_POST["title"]) && isset($_POST["id"]) && isset($_POST["description"]) &&
    isset($_POST["price"]) && isset($_POST["image"])
) {
    if (
        !empty($_POST["title"]) && !empty($_POST["id"]) && !empty($_POST["description"]) && 
        !empty($_POST["price"]) && !empty($_POST["image"])
    ) {
        // Validate and sanitize input (e.g., ID should be an integer, price should be a float)
        $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
        $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
        
        if ($id && $price !== false) {
            $food = new food(
                $id,
                $_POST['title'],
                $_POST['description'],
                $price,
                $_POST['image']
            );
            $foodController->addfood($food);
            header('Location: food.php');
            exit;
        } else {
            $error = "Invalid ID or Price.";
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
    <link rel="stylesheet" href="style.css">
    <title>Add food</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper" style="color:#fd7e14">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">FOOD <sup></sup></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="food.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Food List</span></a>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add food</h1>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <form id="addfoodForm" action="addfood.php" method="POST">
                                            <label for="title">ID:</label><br>
                                            <input class="form-control form-control-user" type="number" id="id" name="id">
                                            <span id="id_error"></span><br>

                                            <label for="title">Title:</label><br>
                                            <input class="form-control form-control-user" type="text" id="title" name="title">
                                            <span id="title_error"></span><br>

                                            <label for="description">Description:</label><br>
                                            <input class="form-control form-control-user" type="text" id="description" name="description">
                                            <span id="description_error"></span><br>

                                            <label for="price">Price:</label><br>
                                            <input class="form-control form-control-user" type="number" id="price" name="price">
                                            <span id="price_error"></span><br>

                                            <label for="image">Image:</label><br>
                                            <input class="form-control form-control-user" type="text" id="image" name="image">
                                            <span id="image_error"></span><br>

                                            <br>

                                            <button type="submit" class="btn btn-primary btn-user btn-block">Add food</button>
                                        </form>
                                        <?php if ($error != ""): ?>
                                            <div class="alert alert-danger mt-2"><?php echo $error; ?></div>
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
                        <span style="color:white">Copyright &copy; CHAKCHOUKA</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="js/addfood.js"></script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>
