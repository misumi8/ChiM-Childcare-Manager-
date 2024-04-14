<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Childcare Manager</title>
    <link rel="stylesheet" href="../styles/home-page.css">
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
    <div class="hp-background">
        <div id="hp-img-container">
            <img src="../page-images/hp-header.png" alt="Home Page Header"/>
            <div id="hp-img-text">CHiM</div>
            <a href="../public/login.php" id="hp-join-button">Join Us!</a>
        </div>
        <div id="hp-text">
            <h1>Childcare Manager</h1>
            <p>In the contemporary era, where families are increasingly digitally connected,
                the need for efficient and user-friendly tools to manage childcare has become paramount.
                Introducing CHiM, an innovative web application designed to cater to the evolving
                needs of modern families and couples in nurturing and managing the growth and development
                of their children from infancy through puberty.
            </p>
            <p>
                CHiM provides a comprehensive platform for authenticated users,
                whether families or couples, to seamlessly manage various aspects of childcare. 
                From tracking feeding and sleep schedules to documenting significant milestones and 
                capturing precious moments through multimedia resources such as photos, videos, and 
                audio recordings, CHiM streamlines the childcare process.
            </p>
            <p>
                Join us on this journey as we revolutionize childcare management with CHiM, 
                your digital companion in parenting.
            </p>
        </div>
        <div class="free-space"></div>
        <div id="hp-delim">
            <img src="../page-images/hp-header-delim.png" alt="hp-delim"/>
        </div>
        <div class="free-space">
            <h2>Created by:</h2>
            <div id="hp-cr">
                <p>Chiriac Andrei</p>
                <p>Georgescu Răzvan</p>
                <img src="../page-images/andrei.jpg"/>
                <img src="../page-images/razvan-new.jpg"/>
            </div>
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