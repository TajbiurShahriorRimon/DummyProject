<?php
if(!isset($_COOKIE['userName'])){
    header('Location: login.php');
}
include '../controllers/ProductsControllers.php';
if(isset($_GET['category_id'])){
    $categoryId = $_GET['category_id'];
    echo "<br>".$categoryId;
    $db = new DataBase();
    $db->dbCon();
    $db->deleteCategory($categoryId);
    header('Location: allcategories.php');
}
?>