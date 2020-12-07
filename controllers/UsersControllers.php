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

if(isset($_POST['login'])) {
    if (empty($_POST['username'])) {
        $err_username = "User Name cannot be empty!";
        $has_err = true;
    }
    else {
        $username = htmlspecialchars($_POST['username']);
    }
    if (empty($_POST['pass'])) {
        $err_pass = "Password cannot be empty!";
        $has_err = true;
    } else {
        $pass = htmlspecialchars($_POST['pass']);
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

if(isset($_POST['signUp'])) {
    if (empty($_POST['name'])) {
        $err_name = "Name cannot be empty!";
    }
    else{
        $name = htmlspecialchars($_POST['name']);
    }
    if (empty($_POST['username'])) {
        $err_username = "Username cannot be empty!";
        $has_err = true;
    }
    if (!empty($_POST['username'])) {
        if(strlen($_POST['username']) < 6){
            $err_username = "Username cannot be less than 6 letter";
            $has_err = true;
        }
        else if(strpos($_POST['username']," ")){
            $err_username = "Spaces is not allowed in a sequence";
            $has_err = true;
        }
        else{
            $username = htmlspecialchars($_POST['username']);
        }
    }

    if (empty($_POST['pass'])) {
        $err_pass= "Password cannot be empty!";
        $has_err = true;
    }
    if (!empty($_POST['pass'])){
        if(strlen($_POST['pass']) < 8) {
            $err_pass= "Password cannot be less than 8 letter";
            $has_err = true;
        }
        if(!strpos($_POST['pass'], "#") && !strpos($_POST['pass'], "?")) {
            $err_pass= "Password must have a special character";
            $has_err = true;
        }
        if(!strpos($_POST['pass'], "1") && !strpos($_POST['pass'], "2") && !strpos($_POST['pass'], "3") && !strpos($_POST['pass'], "4")
            && !strpos($_POST['pass'], "5") && !strpos($_POST['pass'], "6") && !strpos($_POST['pass'], "7") && !strpos($_POST['pass'], "8")
            && !strpos($_POST['pass'], "9") && !strpos($_POST['pass'], "0")){
            $err_pass= "Password must have a number";
            $has_err = true;
        }
        if(strtoupper($_POST['pass']) == $_POST['pass']){
            $err_pass= "Password must have a Lower character";
            $has_err = true;
        }
        if(strtolower($_POST['pass']) == $_POST['pass']){
            $err_pass= "Password must have a Upper character";
            $has_err = true;
        }
        else{
            $pass = htmlspecialchars($_POST['pass']);
        }
    }
    if (!empty($_POST['email'])){
        if(strpos($_POST['email'], ".") && strpos($_POST['email'], "@")){
            if(strpos($_POST['email'], ".") > strpos($_POST['email'], "@")){
                $email = htmlspecialchars($_POST['email']);
            }
            else{
                $err_email = "@ must be before (.)";
                $has_err = true;
            }
        }
        else{
            $err_email = "@ and (.) must be included";
            $has_err = true;
        }
    }
    if(!$has_err){
        $db = new DataBase();
        $db->dbCon();
        $db->insertUser($name, $username, $email, $pass);
    }
}
?>
