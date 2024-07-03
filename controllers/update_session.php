<?php
session_start();

if (isset($_POST['userId'])) {
    $_SESSION['user_id'] = $_POST['userId'];
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'User ID not provided']);
}
?>