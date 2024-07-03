<!DOCTYPE html>
<html lang="en">

<?php
require_once dirname(__DIR__, 2) . '/config.php';
require_once ROOT_PATH . "models/database.php";
?>

<head>
    <meta charset="UTF-8">
    <title>Childcare Manager</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../CHiM/views/public_view/styles/header.css">
    <link rel="stylesheet" href="../CHiM/views/public_view/styles/login.css">
    <link rel="stylesheet" href="../CHiM/views/public_view/styles/home-page.css">
    <link rel="stylesheet" href="../CHiM/views/public_view/styles/feed.css">
    <link rel="stylesheet" href="../CHiM/views/public_view/styles/profile.css">
    <link rel="stylesheet" href="../CHiM/views/public_view/styles/register.css">
    <link rel="stylesheet" href="../CHiM/views/public_view/styles/notFound.css">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Lexend+Deca:wght@100..900&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <p id="header-text">CHiM<br/>Childcare Manager</p>
        <div class="line"></div>
        <div class="item-list">
            <div class="menu-item">
                <img src="../CHiM/views/includes/header-images/home_icon.png" alt="Home Page" /><a href="/CHiM/home" class="menu-link">Home</a>
            </div>
            <div class="menu-item">
                <img src="../CHiM/views/includes/header-images/personal_page_icon.png" alt="Personal Page" /><a href="/CHiM/profile" class="menu-link" id="head-my-page">My page</a>
            </div>
            <div class="menu-item">
                <img src="../CHiM/views/includes/header-images/web_icon.png" /><a href="/CHiM/feed" class="menu-link">Feed</a>
            </div>
        </div>
        <?php if(isset($_SESSION['user_id'])) { 
            echo '<button id="log-out" onclick="logOut(); location.reload(true);">Log out</button>';
        }?>
    </div>
    <script src="../CHiM/controllers/js/header.js"></script>
    <script src="../CHiM/models/headerModel.js"></script>
    <script src="../CHiM/controllers/js/resetSessionOnNavbarClick.js"></script>
