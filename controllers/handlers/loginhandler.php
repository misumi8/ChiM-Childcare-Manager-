<?php
require_once "../includes/database.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
$email = cleanInput($_POST["email"]);
$user_password = cleanInput($_POST["user_password"]);

if(empty($email) || empty($user_password)){
    header("Location: /CHiM/views/public_view/login.php");
    exit();
}

$userInfo = getUserInfo($email, $user_password);

if(empty($userInfo)){
    header("Location: /CHiM/views/public_view/login.php");
    exit();
}

$_SESSION['userInfo'] = $userInfo;
header("Location: /CHiM/views/public_view/profile.php");
exit();
}

header("Location: /CHiM/views/public_view/login.php");
exit();
