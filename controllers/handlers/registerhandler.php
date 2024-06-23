<?php
require_once "../includes/database.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = cleanInput($_POST["register_user_email"]);
    $user_password = cleanInput($_POST["register_user_password"]);
    $fname = cleanInput($_POST["register_user_fname"]);
    $lname = cleanInput($_POST["register_user_lname"]);
    $birthday = cleanInput($_POST["register_user_dob"]);

    if(empty($email) || empty($user_password) || empty($fname) || empty($lname) || empty($birthday)){
        header("Location: /CHiM/views/public_view/register.php");
        exit();
    }

    if(registerNewUser($email, $user_password, $fname, $lname, $birthday)){
        $_SESSION['userInfo'] = getUserInfo($email, $user_password);
        $_SESSION['user_id'] = $_SESSION['userInfo']['id'];
        $_SESSION['child_id'] = getFirstMetChildId($_SESSION['user_id']);
        header("Location: /CHiM/profile?id=" . $_SESSION['userInfo']['id']);
        exit();
    }
}

header("Location: /CHiM/views/public_view/register.php");
exit();