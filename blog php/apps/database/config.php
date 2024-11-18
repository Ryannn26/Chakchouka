<?php
$host ='localhost';
$user='moham';
$password='';
$dbname='blog';
try {
    $conn=new PDO("mysql:host=$host;dbname=$dbname;$user,$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "connected sucessfully";

}catch(PDOException $e){
    echo "Connection failed" .$e->getMessage();
}
?>