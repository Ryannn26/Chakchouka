<?php
include '../../controller/foodcontroller.php';

$error = "";
$food = null;

// Create an instance of the controller
$foodcontroller = new foodcontroller();

// Handle form submission
if (isset($_POST["id"],$_POST["title"],  $_POST["description"], $_POST["price"], $_POST["image"])) {
    if (!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["price"]) && !empty($_POST["image"])) {
        // Sanitize and create a food object
        $food = new food(
            $_POST['id'],
            $_POST['title'],
            $_POST['description'],
            $_POST['price'],
            $_POST['image']
        );

        // Update the food
        $foodcontroller->updatefood($food, $_POST['id']);
        
        // Redirect after update
        header('Location: food.php');
        exit;
    } else {
        $error = "Missing information. Please fill in all fields.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Update Food</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update Food with ID = <?php echo htmlspecialchars($_POST['id']); ?> </h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <?php
                                        if (isset($_POST['id'])) {
                                            $food = $foodcontroller->showfood($_POST['id']);
                                        ?>
                                        <form id="addfoodForm" action="" method="POST">
                                            <?php if ($error): ?>
                                                <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
                                            <?php endif; ?>

                                            <label for="id">Food ID:</label><br>
                                            <input class="form-control form-control-user" type="text" id="id" name="id" readonly value="<?= htmlspecialchars($_POST['id']); ?>"><br>

                                            <label for="title">Title:</label><br>
                                            <input class="form-control form-control-user" type="text" id="title" name="title" value="<?= htmlspecialchars($food['title']); ?>">
                                            <span id="title_error"></span><br>

                                            <label for="description">Description:</label><br>
                                            <input class="form-control form-control-user" type="text" id="description" name="description" value="<?= htmlspecialchars($food['description']); ?>">
                                            <span id="description_error"></span><br>

                                            <label for="price">Price:</label><br>
                                            <input class="form-control form-control-user" type="number" id="price" name="price" value="<?= htmlspecialchars($food['price']); ?>">
                                            <span id="price_error"></span><br>

                                            <label for="image">Image:</label><br>
                                            <input class="form-control form-control-user" type="text" id="image" name="image" value="<?= htmlspecialchars($food['image']); ?>">
                                            <span id="image_error"></span><br>

                                            <br>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Update Food</button>
                                        </form>
                                        <?php }?>
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
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>
