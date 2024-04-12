<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/register.css">
    <!-- aici adaugam toate css-urile-->
    <title>Childcare Manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div id="reg-background-animation"></div>
    <div class="reg-grid">
        <p id="reg-welcome-text">Welcome!</p>
        <div id="reg-loginbox">
            <form action="/test-action" method="post" id="reg-login-form">
                <ul>
                    <div id="reg-full-name">
                        <li id="reg-real-name">
                            <label for="name">First name:</label><br />
                            <input type="text" class="reg-user-name-input" name="user_fname" placeholder="First name" />
                        </li>
                        <li id="reg-real-surname">
                            <label for="name">Last name:</label><br />
                            <input type="text" class="reg-user-name-input" name="user_lname" placeholder="Last name" />
                        </li>
                    </div>
                    <li class="reg-user-input">
                        <label for="name">Email adress:</label><br />
                        <input type="text" class="reg-user-name-input" name="user_name" placeholder="Email address" />
                    </li>
                    <li class="reg-user-input">
                        <label for="name">Date of birth:</label><br />
                        <input type="date" class="reg-user-name-dob-input" name="user_dob" placeholder="Date of birth" />
                    </li>
                    <li class="reg-user-input">
                        <label for="name">Password:</label><br />
                        <input type="text" class="reg-user-password-input" name="user_password" placeholder="Password" />
                    </li>
                    <li class="reg-password-repeat-input">
                        <label for="name">Repeat your password:</label><br />
                        <input type="text" class="reg-user-password-repeat" name="user_password_repeat" placeholder="Repeat password" />
                    </li>
                    <!-- TEMP: onclick="return false;" -->
                    <button type="#" id="reg-register-button" onclick="return false;">Sign up</button>
                    <!-- <div id="reg-login">
                        Already have an account?
                        <a href="#">Login</a>
                    </div> -->
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