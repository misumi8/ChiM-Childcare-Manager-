<?php
require_once '../includes/header.php';
?>

<div id="background-animation"></div>
<div class="grid">
    <div id="welcome-text">Welcome!</div>
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

<?php
require_once '../includes/footer.php';
?>