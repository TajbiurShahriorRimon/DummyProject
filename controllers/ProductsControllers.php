<?php
include '../models/DataBase.php';

$name = '';
$err_name = '';
$prodName = '';
$err_prodName = '';
$category = '';
$err_category = '';
$price = '';
$err_price = '';
$quantity = '';
$err_quantity = '';
$desc = '';
$err_desc = '';
$photo = '';
$err_photo = '';
$filepath = '';
$has_err = false;


if(isset($_POST['addProduct'])) {
    if (empty($_POST['prodName'])) {
        $err_prodName = "Product Name cannot be empty!";
        $has_err = true;
    }
    else {
        $prodName = htmlspecialchars($_POST['prodName']);
    }
    if(!isset($_POST['categoryList'])){
        $err_category = 'Please select a category';
        $has_err = true;
    }
    else{
        $category = $_POST['categoryList'];
    }
    if (empty($_POST['price'])) {
        $err_price = "Price cannot be empty!";
        $has_err = true;
    }
    else {
        $price = htmlspecialchars($_POST['price']);
    }
    if (empty($_POST['quantity'])) {
        $err_quantity = "Quantity cannot be empty!";
        $has_err = true;
    }
    else {
        $quantity = htmlspecialchars($_POST['quantity']);
    }

    if (empty($_POST['description'])) {
        $err_desc = "Description cannot be empty!";
        $has_err = true;
    }
    else {
        $desc = htmlspecialchars($_POST['description']);
    }

    if(empty($_FILES['image']['name'])){
        $err_photo = "Photo is required";
        $has_err = true;
    }
    else{
        $filepath = $_FILES["image"]["name"];
    }

    if(!$has_err){
        $db = new DataBase();
        $db->dbCon();
        //$db->addProduct($prodName, $category, $price, $quantity, $desc, $filepath);
        $db->addProduct($prodName, $price, $quantity, $desc, $filepath);
    }

}


?>
