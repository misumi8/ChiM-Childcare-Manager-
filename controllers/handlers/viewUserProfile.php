<?php
require_once dirname(__DIR__, 2) . '/config.php';
require_once ROOT_PATH . 'models/UserModel.php';

session_start();

if (!isset($_SESSION['userInfo']) || $_SESSION['userInfo']['isAdmin'] == 0) {
    header('HTTP/1.0 403 Forbidden');
    echo 'You are not authorized to view this page.';
    exit();
}

$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

if ($user_id > 0) {
    $userInfo = UserModel::getUserInfoById($user_id);
    if ($userInfo) {
        // Render user profile for editing
        ?>
        <div id="pr-frame">
            <!-- User profile HTML for admin to edit -->
            <form method="post" id="pr-child-data-form">
                <ul id="pr-2col-table">
                    <li>
                        <label for="Name">Name:</label>
                        <input type="text"
                               id="pr-name-input"
                               class="pr-child-info-input"
                               name="name"
                               placeholder="Name"
                               value="<?php echo htmlspecialchars($userInfo['fname'] . ' ' . $userInfo['lname']); ?>"/>
                    </li>
                    <li>
                        <label for="date-of-birtd">Date of birth:</label>
                        <input type="date"
                               id="pr-dob-input"
                               class="pr-child-info-input"
                               name="date-of-birth"
                               placeholder="Date of birth"
                               value="<?php echo htmlspecialchars($userInfo['birthday']); ?>"/>
                    </li>
                    <li>
                        <label for="email">Email:</label>
                        <input type="email"
                               id="pr-email-input"
                               class="pr-child-info-input"
                               name="email"
                               placeholder="Email"
                               value="<?php echo htmlspecialchars($userInfo['email']); ?>"/>
                    </li>
                    <li>
                        <label for="gender">Gender:</label>
                        <input type="radio" id="male" name="gender-type" value="Male" <?php echo $userInfo['gender'] == "Male" ? 'checked' : '';?>/>
                        <label for="male">Boy</label>
                        <input type="radio" id="female" name="gender-type" value="Female" <?php echo $userInfo['gender'] == "Female" ? 'checked' : '';?>/>
                        <label for="female">Girl</label>
                    </li>
                    <button type="submit" class="pr-profile-info-button">Save</button>
                </ul>
            </form>
        </div>
        <?php
    } else {
        echo 'User not found.';
    }
} else {
    echo 'Invalid user ID.';
}

?>
