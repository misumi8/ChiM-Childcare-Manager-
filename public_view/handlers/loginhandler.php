<?php
require_once "../../includes/database.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
$email = cleanInput($_POST["email"]);
$user_password = cleanInput($_POST["user_password"]);

if(empty($email) || empty($user_password)){
    header("Location: ../login.php");
    exit();
}

$userInfo = getUserInfo($email, $user_password);

if(empty($userInfo)){
    header("Location: ../login.php");
    exit();
}

$_SESSION['userInfo'] = $userInfo;
header("Location: ../profile.php");
exit();
}

header("Location: ../login.php");
exit();
