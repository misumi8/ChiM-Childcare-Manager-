<?php
require_once dirname(__DIR__) . '/config.php';
require_once ROOT_PATH . 'models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = intval($_POST['userId']);
    $userModel = new UserModel();

    if ($userModel->deleteUserById($userId)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete user.']);
    }
}
?>
