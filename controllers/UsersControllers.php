<?php
include '../models/DataBase.php';

$err_username = '';
$err_pass = '';
$username = '';
$err_name = '';
$err_email = '';
$name = '';
$pass = '';
$email = '';
$notFound = '';
$has_err = false;
echo 'hefs'."<br>";
if(isset($_POST['login'])) {
    if (empty($_POST['username'])) {
        $err_username = "User Name cannot be empty!";
        $has_err = true;
    }
    else {
        $username = htmlspecialchars($_POST['username']);
    }
    if (empty($_POST['password'])) {
        $err_pass = "Password cannot be empty!";
        $has_err = true;
    } else {
        $pass = htmlspecialchars($_POST['password']);
    }

    if(!$has_err){
        $db = new DataBase();
        $db->dbCon();
        $sig = $db->searchUsers($username, $pass);
        if($sig == 1){
            setcookie('userName', $username, time() + 10000);
            header('Location: dashboard.php');
        }
        else{
            $notFound = "password not matched with username";
        }
    }
}
?>
