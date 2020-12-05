<?php
include '../models/DataBase.php';

$name = '';
$err_name = '';
$has_err = false;
if(isset($_POST['addCategory'])){
    if (empty($_POST['catName'])) {
        $err_name = "Category Name cannot be empty!";
        $has_err = true;
    }
    else {
        $name = htmlspecialchars($_POST['catName']);
    }
    if(!$has_err){
        $db = new DataBase();
        $db->dbCon();
        $db->addCategory($name);
    }
}
?>
