<?php
include '../../controller/foodcontroller.php';
$foodl = new foodcontroller();
$list = $foodl->listfood();
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
        <title>FOOD LIST</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body id="page-top" style="background-color:#ffa500">
        <div id="wrapper" style="background-color:#ffa500">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#ffa500">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="..\FrontOffice\index.php">
                    <div class="sidebar-brand-text mx-3">FOOD MARKET <sup></sup></div>
                </a>
                <hr class="sidebar-divider my-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#" style="color:white">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span style="color:white">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="addfood.php" style="color:white">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span style="color:white">Add food</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="view_orders.php" style="color:white">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span style="color:white">view orders</span>
                    </a>
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
                            <h1 class="h3 mb-0 text-gray-800">Food List</h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Price</th>
                                                        <th>Image</th>
                                                    </tr>
                                                    <?php if (empty($list)): ?>
                                                        <tr><td colspan="5">No foods available.</td></tr>
                                                    <?php else: ?>
                                                        <?php foreach ($list as $offer): ?>
                                                            <tr>
                                                                <td><?= htmlspecialchars($offer['id']); ?></td>
                                                                <td><?= htmlspecialchars($offer['title']); ?></td>
                                                                <td><?= htmlspecialchars($offer['description']); ?></td>
                                                                <td><?= htmlspecialchars($offer['price']); ?></td>
                                                                <td><img src="<?= htmlspecialchars($offer['image']); ?>" alt="Food Image" style="width: 100px; height: 100px;"></td>
                                                                <td align="center">
                                                                    <form method="POST" action="updatefood.php">
                                                                        <input type="submit" name="update" value="Update">
                                                                        <input type="hidden" value="<?= htmlspecialchars($offer['id']); ?>" name="id">
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <a href="deletefood.php?id=<?= htmlspecialchars($offer['id']); ?>">Delete</a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </table>
                                            </div>
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
