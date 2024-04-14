<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/profile.css">
    <link rel="stylesheet" href="../styles/feed.css">
    <!-- aici adaugam toate css-urile-->

    <!-- Fonts: -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <title>Childcare Manager</title>
</head>

<body>
    <div class="header">
        <p id="header-text">CHiM<br/>Childcare Manager</p>
        <div class="line"></div>
        <div class="item-list">
            <div class="menu-item">
            <img src="..\includes\header-images\home_icon.png" alt="Home Page" /><a href="../public/home-page.php">Home</a>
            </div>
            <div class="menu-item">
                <img src="..\includes\header-images\personal_page_icon.png" alt="Personal Page" /><a href="../public/profile.php" id="head-my-page">My page</a>
            </div>
            <div class="menu-item">
                <img src="..\includes\header-images\web_icon.png" /><a href="../public/feed.php">Feed</a>
            </div>
        </div>
        <!-- <div class="line"></div> -->
    </div>
</body>

</html>