<body>
    <div id="reg-frame">
        <div id="reg-background-animation"></div>
        <div class="reg-grid">
            <p id="reg-welcome-text">Welcome!</p>
            <div id="reg-loginbox">
                <form action="/test-action" method="post" id="reg-login-form">
                    <ul>
                        <div id="reg-full-name">
                            <li id="reg-real-name">
                                <label for="register_user_fname">First name:</label><br />
                                <input type="text" class="reg-user-name-input" name="register_user_fname" placeholder="First name" />
                            </li>
                            <li id="reg-real-surname">
                                <label for="register_user_lname">Last name:</label><br />
                                <input type="text" class="reg-user-name-input" name="register_user_lname" placeholder="Last name" />
                            </li>
                        </div>
                        <li class="reg-user-input">
                            <label for="register_user_email">Email adress:</label><br />
                            <input type="text" class="reg-user-name-input" name="register_user_email" placeholder="Email address" />
                        </li>
                        <li class="reg-user-input">
                            <label for="register_user_dob">Date of birth:</label><br />
                            <input type="date" class="reg-user-name-dob-input" name="register_user_dob" placeholder="Date of birth" />
                        </li>
                        <li class="reg-user-input">
                            <label for="register_user_password">Password:</label><br />
                            <input type="text" class="reg-user-password-input" name="register_user_password" placeholder="Password" />
                        </li>
                        <li class="reg-password-repeat-input">
                            <label for="register_user_password_repeat">Repeat your password:</label><br />
                            <input type="text" class="reg-user-password-repeat" name="register_user_password_repeat" placeholder="Repeat password" />
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
    </div>
</body>

<?php
require_once '../includes/header.php';
?>

<?php
require_once '../includes/footer.php';
?>