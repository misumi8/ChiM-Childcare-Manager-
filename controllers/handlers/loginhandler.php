<?php
require_once "..\..\models\database.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = cleanInput($_POST["email"]);
    $user_password = cleanInput($_POST["user_password"]);

    error_log("Login attempt: Email - " . $email);

    $userInfo = getUserInfo($email, $user_password);
    if ($userInfo) {
        $_SESSION['userInfo'] = $userInfo;
        $_SESSION['user_id'] = $userInfo['id'];
        $_SESSION['child_id'] = getFirstMetChildId($_SESSION['user_id']);
        header("Location: /CHiM/profile?id=" . $_SESSION['userInfo']['id']);
    } else {
        $_SESSION['login_errors'] = "Invalid email or password.";
        header("Location: /CHiM/login");
    }
    exit();
}

header("Location: /CHiM/login");
exit();
