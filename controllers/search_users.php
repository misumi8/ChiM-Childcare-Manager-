<?php
require_once dirname(__DIR__) . "/config.php";
require_once ROOT_PATH . "models/UserModel.php";

$query = isset($_GET['query']) ? cleanInput($_GET['query']) : '';
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 5;
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$users = UserModel::getAllUsers($query, $limit, $offset);

header('Content-Type: application/json');
echo json_encode(['users' => $users]);
?>