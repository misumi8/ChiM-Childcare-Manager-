<?php
require_once "../../includes/database.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
$email = cleanInput($_POST["register_user_email"]);
$user_password = cleanInput($_POST["register_user_password"]);
$fname = cleanInput($_POST["register_user_fname"]);
$lname = cleanInput($_POST["register_user_lname"]);
$dob = cleanInput($_POST["register_user_dob"]);

if(empty($email) || empty($user_password) || empty($fname) || empty($lname) || empty($dob)){
    header("Location: ../register.php");
    exit();
}

if(registerNewUser($email, $user_password, $fname, $lname, $birthday)){
    $_SESSION['userInfo'] = getUserInfo($email, $user_password);
    header("Location: ../profile.php");
    exit();
}
}

header("Location: ../register.php");
exit();