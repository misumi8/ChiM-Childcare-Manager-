<?php
session_start();

if (isset($_SESSION['userInfo']['isAdmin']) && $_SESSION['userInfo']['isAdmin'] != 0) {
    $_SESSION['user_id'] = $_SESSION['userInfo']['id'];
    echo json_encode(['status' => 'success']);
}
?>
