<?php
require_once dirname(__DIR__, 2) . '/config.php';
require_once ROOT_PATH . 'models/database.php';
require_once ROOT_PATH . 'controllers/RegisterController.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["register_user_email"];
    $password = $_POST["register_user_password"];
    $fname = $_POST["register_user_fname"];
    $lname = $_POST["register_user_lname"];
    $dob = $_POST["register_user_dob"];
    
    $registerController = new RegisterController();
    $registerController->register($email, $password, $fname, $lname, $dob);
}

header("Location: /CHiM/register");
exit();
?>