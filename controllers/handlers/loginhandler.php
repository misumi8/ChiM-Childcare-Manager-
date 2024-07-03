<?php
require_once dirname(__DIR__, 2) . '/config.php';

require_once ROOT_PATH . "models/database.php";
require_once ROOT_PATH . "controllers/LoginController.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["user_password"];
    
    $loginController = new LoginController();
    $loginController->login($email, $password);
}

header("Location: /CHiM/login");
exit();
?>
