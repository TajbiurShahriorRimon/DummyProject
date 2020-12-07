<?php
if(!isset($_COOKIE['userName'])){
    header('Location: login.php');
}
include '../controllers/ProductsControllers.php';
if(isset($_GET['product_id'])){
    $productId = $_GET['product_id'];
    $db = new DataBase();
    $db->dbCon();
    $db->deleteProduct($productId);
    header('Location: allproducts.php');
}
?>
