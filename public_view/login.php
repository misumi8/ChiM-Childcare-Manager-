<?php
require_once '../includes/header.php';
?>

<div id="login-frame">
    <div id="background-animation"></div>
    <div class="grid">
        <p id="welcome-text">Welcome!</p>
        <div id="loginbox">
            <form action="./handlers/loginhandler.php" method="post" id="login-form">
                <ul>
                    <li id="user-name">
                        <label for="email">Email adress:</label><br />
                        <input requred type="text" class="user-name-input" name="email" placeholder="Email address" />
                        <br>
                        <span id="login-email-error"></span>
                    </li>
                    <li id="user-password">
                        <label for="password">Password:</label><br />
                        <input requred type="text" class="user-password-input" name="user_password" placeholder="Password" />
                        <br>
                        <span id="login-password-error"></span>
                    </li>
                    <button type="submit" id="login-button">Log in</button>
                    <div id="register">
                        Not registered yet?
                        <a href="register.php">Register</a>
                    </div>
                </ul>
            </form>
        </div>
    </div>
</div>

<script src="./js/login.js"> </script>
<?php
require_once '../includes/footer.php';
?>