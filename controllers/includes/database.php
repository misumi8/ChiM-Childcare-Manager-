<?php
// FUTURE -> transfer to /models
define('DATABASE_HOST', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '');
define('DATABASE_NAME', 'CHIM');

$pdo = pdoConnectMysqli();

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/CHiM/models/database2.php";

function pdoConnectMysqli()
{
    try {
        return new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME . ';charset=utf8', DATABASE_USER, DATABASE_PASS);
    } catch (PDOException $exception) {
        exit('Failed to connect to database');
    }
}

function getUserInfo($email, $user_password)
{
    $hashed_pass = password_hash($user_password, PASSWORD_DEFAULT);
    $stmt = $GLOBALS['pdo']->prepare("SELECT id, email, fname, lname, birthday, profile_pic FROM users WHERE user_password = ? AND email = ? ");
    $stmt->execute([$hashed_pass, $email]);
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($userInfo)) {
        $userChildrenInfo = getUserChildrenInfo($userInfo['id']);
        $userInfo = array_merge($userInfo, $userChildrenInfo);
    }

    return $userInfo;
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
    $stmt = $GLOBALS['pdo']->prepare("SELECT fname, lname, profile_pic FROM users WHERE id = ? ");
    $stmt->execute([$userId]);
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    return $userInfo;
}

function getUserChildrenInfo($userId)
{
    $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM children WHERE user_id = ? ");
    $stmt->execute([$userId]);
    $userChildrenInfo = $stmt->fetchALL(PDO::FETCH_ASSOC);
    // de adaugat media si relationships
    return $userChildrenInfo;
}

function getFeedMedia()
{
    return $GLOBALS['pdo']->query("SELECT * FROM media WHERE shared = true")->fetchALL(PDO::FETCH_ASSOC);
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
