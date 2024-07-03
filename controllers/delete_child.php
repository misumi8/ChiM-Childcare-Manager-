<?php

require_once dirname(__DIR__) . '/config.php';
require_once ROOT_PATH . 'models/UserModel.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $childId = isset($_POST['childId']) ? intval($_POST['childId']) : 0;
    if ($childId > 0) {
        $result = UserModel::deleteChildById($childId);
        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete child']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid child ID']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
