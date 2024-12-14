<?php

$host ='localhost';
$user='moham';
$password='';
$dbname='blog1';
try {
    $conn=new PDO("mysql:host=$host;dbname=$dbname;$user,$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "Connection failed" .$e->getMessage();
    if("Location: config.php"){
        echo("connected succesfully ");
    }
}

?>