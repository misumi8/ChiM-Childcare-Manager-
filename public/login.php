<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/login.css">
    <!-- aici adaugam toate css-urile-->
    <title>Childcare Manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div id="background-animation"></div>
    <div class="grid">
        <p id="welcome-text">Welcome!</p>
        <div id="loginbox">
            <form action="/test-action" method="post" id="login-form">
                <ul>
                    <li id="user-name">
                        <label for="name">Email adress:</label><br />
                        <input type="text" class="user-name-input" name="user_name" placeholder="Email address" />
                    </li>
                    <li id="user-password">
                        <label for="name">Password:</label><br />
                        <input type="text" class="user-password-input" name="user_password" placeholder="Password" />
                    </li>
                    <!-- TEMP: onclick="return false;" -->
                    <button type="#" id="login-button" onclick="return false;">Log in</button>
                    <div id="register">
                        Not registered yet?
                        <a href="#">Register</a>
                    </div>
                </ul>
            </form>
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