<?php
require_once dirname(__DIR__) . '/config.php';
require_once ROOT_PATH . 'models/UserModel.php';

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $memoryId = isset($_POST['memoryId']) ? intval($_POST['memoryId']) : 0;
        if ($memoryId > 0) {
            $result = UserModel::deleteMediaById($memoryId);
            if ($result) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete memory']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid memory ID']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
