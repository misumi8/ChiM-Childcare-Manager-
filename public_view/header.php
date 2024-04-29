<!DOCTYPE html>
<html lang="en">

<?php
require_once "../includes/database.php";
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="header.css">
    <!-- aici adaugam toate css-urile-->
    <title>Childcare Manager</title>
</head>

<body>
    <div class="header">
        <p id="header-text">CHiM<br/>Childcare Manager</p>
        <div class="line"></div>
        <div class="item-list">
            <div class="menu-item">
                <img src="home_icon.png" alt="Home Page" /><a href="../public_view/home-page.php">Home</a>
            </div>
            <div class="menu-item">
                <img src="personal_page_icon.png" alt="Personal Page" /><a href="../public_view/profile.php">Your page</a>
            </div>
            <div class="menu-item">
                <img src="web_icon.png" /><a href="../public_view/feed.php">Feed</a>
            </div>
        </div>
        <!-- <div class="line"></div> -->
    </div>
</body>

</html>

<?php
require_once '../includes/header.php';
?>

<?php
require_once '../includes/footer.php';
?>