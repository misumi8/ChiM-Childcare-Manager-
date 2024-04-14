<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="profile.css">
    <!-- aici adaugam toate css-urile-->
    <title>Childcare Manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Lexend+Deca:wght@100..900&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Lexend+Deca:wght@100..900&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div id="pr-frame">
        <div id="pr-child-info">
            <div id="pr-first-row">
                <div id="pr-photo">
                    <img src="../page-images/pr-photo.jpg"/>
                </div>
                <div id="pr-child-info">
                    <div id="pr-2col-table">
                        <span>Name: <span class="pr-answer">Ilie</span></span>
                        <span>Age: <span class="pr-answer">3</span></span>
                        <span>Date of birth: <span class="pr-answer">01.11.2020</span></span>
                        <span>Zodiac sign: <span class="pr-answer">Libra</span></span>
                        <span>Favorite food: <span class="pr-answer">Apples</span></span>
                        <span>Favorite game: <span class="pr-answer">Hide and seek</span></span>
                    </div>
                    <span id="pr-last-info-item">Greatest fear: <span class="pr-answer">Heights</span></span>
                    <button type="#" id="pr-add-more-info-button" onclick="return false;">Add more info</button>
                </div>
            </div>
            <div id="pr-timeline">
                <div id="pr-line"></div>
                <div id="pr-arrow"></div>
            </div>
            <div id="pr-child-buttons">
                <div id="pr-add-memory">
                    <button type="#" id="pr-add-memory-button" onclick="return false;">Add memory</button>
                </div>
                <div id="pr-calendar-sh-fh">
                    <button type="#" id="pr-see-calendar" onclick="return false;">Calendar</button>
                </div>
            </div>
        </div>

        <div class="pr-child-panel">
            <a href=""><div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 1</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 2</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 3</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 4</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 5</span>
            </div>
            </a>
            <a href=""><div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 6</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 7</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 8</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 9</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 10</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 11</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 12</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 13</span>
            </div>
            </a>
            <a href="">
                <div class="pr-child-container">
                <img src="../page-images/user1_profile.jpg">
                <span>Child 14</span>
            </div>
            </a>
            <div id="pr-p-container"><a href="">+</a></div>
        </div>
    </div>
</body>
</html>

<?php
require_once '../includes/header.php';
?>
<?php
require_once '../includes/footer.php';
?>