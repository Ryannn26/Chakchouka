<?php
include '../../controller/foodcontroller.php';
$foodc = new foodcontroller();
$foodc->deletefood($_GET["id"]);
header('Location:food.php');
