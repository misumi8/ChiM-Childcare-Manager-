<?php
require_once dirname(__DIR__, 2) . '/config.php';
require_once ROOT_PATH . '/views/includes/header.php';

$failedLoginAttempt = '';

if (isset($_SESSION['login_errors'])) {
    $failedLoginAttempt = $_SESSION['login_errors'];
    unset($_SESSION['login_errors']);
}
?>

<div id="login-frame">
    <div id="background-animation"></div>
    <div class="grid">
        <p id="welcome-text">Welcome!</p>
        <div id="loginbox">
            <form action="/CHiM/controllers/handlers/loginhandler.php" method="post" id="login-form">
                <ul>
                    <li id="user-name">
                        <label for="user-name-input-id">Email address:</label><br />
                        <input type="text" class="user-name-input" id="user-name-input-id" name="email" placeholder="Email address" autocomplete="on" />
                        <br>
                        <span id="login-email-error"><?= htmlspecialchars($failedLoginAttempt); ?></span>
                    </li>
                    <li id="user-password-input">
                        <label for="user-password-input-id">Password:</label><br />
                        <input type="password" class="user-password-input" id="user-password-input-id" name="user_password" placeholder="Password" />
                        <br>
                        <span id="login-password-error"><?= htmlspecialchars($failedLoginAttempt); ?></span>
                    </li>
                    <button type="submit" id="login-button">Log in</button>
                    <div id="register">
                        Not registered yet?
                        <a href="/CHiM/register">Register</a>
                    </div>
                </ul>
            </form>
        </div>
    </div>
</div>

<script>
    var failedLoginAttempt = "<?= $failedLoginAttempt; ?>";
</script>

<script src="../CHiM/controllers/js/login.js"></script>

<?php
require_once dirname(__DIR__, 2) . '/views/includes/footer.php';
?>