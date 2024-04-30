<body>
    <div id="login-frame">
        <div id="background-animation"></div>
        <div class="grid">
            <p id="welcome-text">Welcome!</p>
            <div id="loginbox">
                <form action="./loginhandler.php" method="post" id="login-form">
                    <ul>
                        <li id="user-name">
                            <label for="email">Email adress:</label><br />
                            <input requred type="text" pattern="^[a-z0-9A-Z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" class="user-name-input" name="email" placeholder="Email address" />
                        </li>
                        <li id="user-password">
                            <label for="password">Password:</label><br />
                            <input requred type="text" pattern="^[a-zA-Z0-9!@#$%^&*()\-_=+|{}[\]:;'<>,.?/~]{8,50}$" class="user-password-input" name="user_password" placeholder="Password" />
                        </li>
                        <!-- TEMP: onclick="return false;" -->
                        <button type="submit" id="login-button" >Log in</button>
                        <div id="register">
                            Not registered yet?
                            <a href="register.php">Register</a>
                        </div>
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