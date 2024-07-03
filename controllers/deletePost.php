<?php
require_once dirname(__DIR__) . '/config.php';
require_once ROOT_PATH . "models/database.php";

session_start();

if ($_SESSION['userInfo']['isAdmin'] == 0) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit();
}

if (isset($_POST['post_id'])) {
    $postId = intval($_POST['post_id']);
    
    if (deleteMediaById($postId)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete post']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
