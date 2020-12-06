<?php
include '../models/DataBase.php';

$name = '';
$err_name = '';
$prodName = '';
$err_prodName = '';
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
        $filepath = $_FILES["file"]["name"];
    }

    if(!$has_err){
        $db = new DataBase();
        $db->dbCon();
        $db->addProduct($prodName, $price, $quantity, $desc, $filepath);
    }

}


?>
