<?php
require_once dirname(__DIR__, 2) . '/config.php';
require_once ROOT_PATH . 'models/UserModel.php';

session_start();

if (!isset($_SESSION['userInfo']) || $_SESSION['userInfo']['isAdmin'] == 0) {
    header('HTTP/1.0 403 Forbidden');
    echo json_encode(['success' => false, 'message' => 'You are not authorized to perform this action.']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = intval($_POST['user_id']);
    $fname = $_POST['name'];
    $dob = $_POST['date-of-birth'];
    $email = $_POST['email'];
    $gender = $_POST['gender-type'];

    $fields = [
        'fname' => $fname,
        'birthday' => $dob,
        'email' => $email,
        'gender' => $gender,
    ];

    if (UserModel::updateUser($userId, $fields)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating user']);
    }
    exit();
}

echo json_encode(['success' => false, 'message' => 'Invalid request method']);
?>
