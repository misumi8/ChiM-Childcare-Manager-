<?php
require_once '../CHiM/views/includes/header.php';
?>

<div id="reg-frame">
    <div id="reg-background-animation"></div>
    <div class="reg-grid">
        <p id="reg-welcome-text">Welcome!</p>
        <div id="reg-loginbox">
            <form action="/CHiM/controllers/handlers/registerhandler.php" method="post" id="reg-login-form">
                <ul>
                    <div id="reg-full-name">
                        <li id="reg-real-name">
                            <label for="register_user_fname">First name:</label><br />
                            <input type="text" class="reg-user-name-input" id="reg-fname" name="register_user_fname" placeholder="First name" />
                            <br>
                            <span id="login-fname-error"></span>
                        </li>
                        <li id="reg-real-surname">
                            <label for="register_user_lname">Last name:</label><br />
                            <input type="text" class="reg-user-name-input" id="reg-lname" name="register_user_lname" placeholder="Last name" />
                            <br>
                            <span id="login-lname-error"></span>
                        </li>
                    </div>
                    <li class="reg-user-input">
                        <label for="register_user_email">Email adress:</label><br />
                        <input type="text" class="reg-user-name-input" id="reg-email" name="register_user_email" placeholder="Email address" />
                        <br>
                        <span id="login-email-error"></span>
                    </li>
                    <li class="reg-user-input">
                        <label for="register_user_dob">Date of birth:</label><br />
                        <input type="date" class="reg-user-name-dob-input" id="reg-dob" name="register_user_dob" placeholder="Date of birth" />
                        <br>
                        <span id="login-dob-error"></span>
                    </li>
                    <li class="reg-user-input">
                        <label for="register_user_password">Password:</label><br />
                        <input type="text" class="reg-user-password-input" id="reg-pass" name="register_user_password" placeholder="Password" />
                        <br>
                        <span id="login-password-error"></span>
                    </li>
                    <li class="reg-password-repeat-input">
                        <label for="register_user_password_repeat">Repeat your password:</label><br />
                        <input type="text" class="reg-user-password-repeat" id="reg-pass-repeat" name="register_user_password_repeat" placeholder="Repeat password" />
                        <br>
                        <span id="login-password-repeat-error"></span>
                    </li>
                    <br>
                    <button type="submit" id="login-button">Sign up</button>
                    <br><br>
                    <div id="reg-login">
                        Already have an account?
                        <a href="/CHiM/login">Login</a>
                    </div>
                </ul>
            </form>
        </div>
    </div>
</div>

<script src="../CHiM/controllers/js/register.js"></script>

<?php
require_once '../CHiM/views/includes/footer.php';
?>