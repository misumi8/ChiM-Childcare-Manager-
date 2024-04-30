<!DOCTYPE html>
<html lang="en">

<?php
//require_once "../includes/database.php";
?>

<head>
    <meta charset="UTF-8">
    <title>Childcare Manager</title>
    <!-- aici adaugam toate css-urile-->
    <link rel="stylesheet" href="../public_view/styles/header.css">
    <link rel="stylesheet" href="../public_view/styles/login.css">
    <link rel="stylesheet" href="../public_view/styles/home-page.css">
    <link rel="stylesheet" href="../public_view/styles/feed.css">
    <link rel="stylesheet" href="../public_view/styles/profile.css">
    <link rel="stylesheet" href="../public_view/styles/register.css">

    <!-- FONTS: -->
    <!-- register -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- profile -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Lexend+Deca:wght@100..900&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Lexend+Deca:wght@100..900&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <!-- login -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- home-page -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Lexend+Deca:wght@100..900&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Lexend+Deca:wght@100..900&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <p id="header-text">CHiM<br/>Childcare Manager</p>
        <div class="line"></div>
        <div class="item-list">
            <div class="menu-item">
            <img src="../includes/header-images/home_icon.png" alt="Home Page" /><a href="../public_view/home-page.php">Home</a>
            </div>
            <div class="menu-item">
                <img src="../includes/header-images/personal_page_icon.png" alt="Personal Page" /><a href="../public_view/profile.php" id="head-my-page">My page</a>
            </div>
            <div class="menu-item">
                <img src="../includes/header-images/web_icon.png" /><a href="../public_view/feed.php">Feed</a>
            </div>
        </div>
        <!-- <div class="line"></div> -->
    </div>
</body>

</html>