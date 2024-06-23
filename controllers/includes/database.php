<?php
// FUTURE -> transfer to /models
define('DATABASE_HOST', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '');
define('DATABASE_NAME', 'CHIM');

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/CHiM/models/database2.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $GLOBALS['pdo'] = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME . ';charset=utf8', DATABASE_USER, DATABASE_PASS);
    $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}



function getUserInfo($email, $user_password)
{
    $stmt = $GLOBALS['pdo']->prepare("SELECT id, email, user_password, fname, lname, birthday, profile_pic FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userInfo && password_verify($user_password, $userInfo['user_password'])) {
        unset($userInfo['user_password']);
        $userChildrenInfo = getUserChildrenInfo($userInfo['id']);
        $userInfo = array_merge($userInfo, ['children' => $userChildrenInfo]);
        return $userInfo;
    }

    return null;
}


function doesEmailExist($email)
{
    $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $count = $stmt->fetch(PDO::FETCH_COLUMN);

    return $count > 0;
}

function getUserInfoPost($userId)
{
    $stmt = $GLOBALS['pdo']->prepare("SELECT fname, lname, profile_pic FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    return $userInfo;
}

function getUserChildrenInfo($userId)
{
    $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM children WHERE user_id = ?");
    $stmt->execute([$userId]);
    $userChildrenInfo = $stmt->fetchALL(PDO::FETCH_ASSOC);
    // de adaugat media si relationships
    return $userChildrenInfo;
}

function getFeedMedia($limit = 10, $offset = 0) {
    try {
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM media WHERE shared = true ORDER BY shared_at DESC LIMIT ? OFFSET ?");
        $stmt->bindParam(1, $limit, PDO::PARAM_INT);
        $stmt->bindParam(2, $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}

function registerNewUser($email, $user_password, $fname, $lname, $birthday)
{
    $hashed_pass = password_hash($user_password, PASSWORD_DEFAULT);

    if (empty(getUserInfo($email, $user_password))) {
        $stmt = $GLOBALS['pdo']->prepare("INSERT INTO users (email, user_password, fname, lname, birthday) VALUES  (?, ?, ?, ?, ?)");
        $stmt->execute([$email, $hashed_pass, $fname, $lname, $birthday]);
        return true;
    } else {
        return false;
    }
}

function loggedIn()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    }
    return false;
}

function cleanInput($data)
{
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

// $stmt = $GLOBALS['pdo']->prepare("UPDATE users SET user_password = ? WHERE id = 8");
// $stmt->execute([password_hash("somePass123@", PASSWORD_DEFAULT)]);
