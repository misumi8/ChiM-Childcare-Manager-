<?php
define('DATABASE_HOST', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '');
define('DATABASE_NAME', 'CHIM');

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database {
    private static $pdo = null;
    
    public static function connect() {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME . ';charset=utf8', DATABASE_USER, DATABASE_PASS);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Could not connect to the database: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
    
    public static function fetch($sql, $params = []) {
        $stmt = self::connect()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetchOne($sql, $params = []) {
        $stmt = self::connect()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function execute($sql, $params = []) {
        $stmt = self::connect()->prepare($sql);
        return $stmt->execute($params);
    }
}

function getUserInfo($email, $user_password) {
    $userInfo = Database::fetchOne("SELECT id, email, user_password, fname, lname, birthday, profile_pic FROM users WHERE email = ?", [$email]);
    if ($userInfo && password_verify($user_password, $userInfo['user_password'])) {
        unset($userInfo['user_password']);
        $userChildrenInfo = getUserChildrenInfo($userInfo['id']);
        $userInfo['children'] = $userChildrenInfo;
        return $userInfo;
    }
    return null;
}

function doesEmailExist($email) {
    $count = Database::fetchOne("SELECT count(*) as count FROM users WHERE email = ?", [$email])['count'];
    return $count > 0;
}

function getUserInfoPost($userId) {
    return Database::fetchOne("SELECT fname, lname, profile_pic FROM users WHERE id = ?", [$userId]);
}

function getUserChildrenInfo($userId) {
    return Database::fetch("SELECT * FROM children WHERE user_id = ?", [$userId]);
}

function getFeedMedia($limit = 10, $offset = 0) {
    return Database::fetch("SELECT * FROM media WHERE shared = true ORDER BY shared_at DESC LIMIT $limit OFFSET $offset");
}

function registerNewUser($email, $user_password, $fname, $lname, $birthday) {
    if (doesEmailExist($email)) {
        return false;
    }
    $hashed_pass = password_hash($user_password, PASSWORD_DEFAULT);
    return Database::execute("INSERT INTO users (email, user_password, fname, lname, birthday) VALUES (?, ?, ?, ?, ?)", [$email, $hashed_pass, $fname, $lname, $birthday]);
}

function updateRecord($table, $id, $fields) {
    $setClause = implode(", ", array_map(function($field) { return "$field = ?"; }, array_keys($fields)));
    $params = array_values($fields);
    $params[] = $id;
    $sql = "UPDATE $table SET $setClause WHERE id = ?";
    return Database::execute($sql, $params);
}

function updateChild($id, $fields) {
    return updateRecord('children', $id, $fields);
}

function updateUser($id, $fields) {
    if (isset($fields['user_password'])) {
        $fields['user_password'] = password_hash($fields['user_password'], PASSWORD_DEFAULT);
    }
    return updateRecord('users', $id, $fields);
}

function addNewRecord($table, $fields) {
    $columns = implode(", ", array_keys($fields));
    $placeholders = implode(", ", array_fill(0, count($fields), "?"));
    $params = array_values($fields);
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    return Database::execute($sql, $params);
}

function updateMedicalRecord($id, $child_id, $user_id, $doctor_name, $diagnosis, $treatment, $record_date) {
    $fields = compact('child_id', 'user_id', 'doctor_name', 'diagnosis', 'treatment', 'record_date');
    return updateRecord('medical_records', $id, array_filter($fields));
}

function updateSleepingRecord($id, $child_id, $rec_weekday, $start_time, $end_time, $rec_description) {
    $fields = compact('child_id', 'rec_weekday', 'start_time', 'end_time', 'rec_description');
    return updateRecord('sleeping_records', $id, array_filter($fields));
}

function updateFeedingRecord($id, $child_id, $rec_weekday, $record_time, $rec_description) {
    $fields = compact('child_id', 'rec_weekday', 'record_time', 'rec_description');
    return updateRecord('feeding_records', $id, array_filter($fields));
}

function addNewMedicalRecordWithChildId($child_id, $user_id, $doctor_name, $diagnosis, $treatment) {
    $fields = compact('child_id', 'user_id', 'doctor_name', 'diagnosis', 'treatment');
    return addNewRecord('medical_records', $fields);
}

function addNewSleepingRecordWithChildId($child_id, $rec_weekday, $start_time, $end_time, $rec_description) {
    $fields = compact('child_id', 'rec_weekday', 'start_time', 'end_time', 'rec_description');
    return addNewRecord('sleeping_records', $fields);
}

function addNewFeedingRecordWithChildId($child_id, $rec_weekday, $record_time, $rec_description) {
    $fields = compact('child_id', 'rec_weekday', 'record_time', 'rec_description');
    return addNewRecord('feeding_records', $fields);
}

function addNewChildren($user_id, $fullname, $birthday, $height, $gender, $fav_food, $fav_hobby) {
    $fields = compact('user_id', 'fullname', 'birthday', 'height', 'gender', 'fav_food', 'fav_hobby');
    return addNewRecord('children', $fields);
}

function addNewUser($email, $user_password, $fname, $lname, $birthday) {
    if (!preg_match('/^[a-zA-Z0-9._]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/', $email)) {
        return [400, "Invalid email address"];
    } else if (strlen($user_password) < 8) {
        return [400, "Password must contain at least 8 characters"];
    }
    $hashed_pass = password_hash($user_password, PASSWORD_DEFAULT);
    $fields = [
        'email' => $email,
        'user_password' => $hashed_pass,
        'fname' => $fname,
        'lname' => $lname,
        'birthday' => $birthday
    ];
    return addNewRecord('users', $fields);
}

function deleteRecordById($table, $id) {
    return Database::execute("DELETE FROM $table WHERE id = ?", [$id]);
}

function deleteMedicalRecordById($id) {
    return deleteRecordById('medical_records', $id);
}

function deleteSleepingRecordById($id) {
    return deleteRecordById('sleeping_records', $id);
}

function deleteFeedingRecordById($id) {
    return deleteRecordById('feeding_records', $id);
}

function deleteMediaById($id) {
    return deleteRecordById('media', $id);
}

function deleteChildById($childId) {
    return deleteRecordById('children', $childId);
}

function deleteUserById($userId) {
    return deleteRecordById('users', $userId);
}

function getMedicalRecordsByChildId($child_id) {
    return Database::fetch("SELECT * FROM medical_records WHERE child_id = ? ORDER BY record_date ASC", [$child_id]);
}

function getAllSleepingRecords($childId) {
    return Database::fetch("SELECT * FROM sleeping_records WHERE child_id = ?", [$childId]);
}

function getAllFeedingRecords($childId) {
    return Database::fetch("SELECT * FROM feeding_records WHERE child_id = ?", [$childId]);
}

function getFeedingRecords($child_id, $weekday){
    return Database::fetch("SELECT * FROM feeding_records WHERE child_id = ? and rec_weekday = ? ORDER BY record_time ASC", [$child_id, $weekday]);
}

function getSleepingRecords($child_id, $weekday){
    return Database::fetch("SELECT * FROM sleeping_records WHERE child_id = ? and rec_weekday = ? ORDER BY start_time ASC", [$child_id, $weekday]);
}

function getMediaInfoById($id) {
    return Database::fetchOne("SELECT * FROM media WHERE id = ?", [$id]);
}

function getChildInfoByParentId($childId, $userId) {
    return Database::fetchOne("SELECT * FROM children WHERE id = ? and user_id = ?", [$childId, $userId]);
}

function getUserInfoById($userId) {
    return Database::fetchOne("SELECT * FROM users WHERE id = ?", [$userId]);
}

function getFirstMetChildId($userId) {
    return Database::fetchOne("SELECT id FROM children WHERE user_id = ?", [$userId])['id'];
}

function addNewChild($userId, $name, $dob, $gender, $height, $hobby, $food) {
    $newChildId = Database::fetchOne("SELECT max(id) as id FROM children")['id'] + 1;
    $fields = [
        'user_id' => $userId,
        'id' => $newChildId,
        'fullname' => $name,
        'birthday' => $dob,
        'height' => $height,
        'gender' => $gender,
        'fav_food' => $food,
        'fav_hobby' => $hobby
    ];
    return addNewRecord('children', $fields);
}

function getChildInfo($child_id) {
    return Database::fetchOne("SELECT * FROM children WHERE id = ?", [$child_id]);
}

function getChildPic($child_id) {
    $childPic = Database::fetchOne("SELECT photo FROM children WHERE id = ?", [$child_id]);
    return !isset($childPic['photo']) ? base64_encode("") : base64_encode($childPic['photo']);
}

function setChildPic($child_id, $photo) {
    Database::execute("UPDATE children SET photo = ? WHERE id = ?", [file_get_contents($photo), $child_id]);
}

function getChildMemories($child_id) {
    return Database::fetch("SELECT * FROM media WHERE child_id = ?", [$child_id]);
}

function addChildMemory($child_id, $user_id, $shared, $media_type, $photo, $media_description, $important) {
    if (isset($photo) && !empty($photo)) {
        $fields = compact('child_id', 'user_id', 'important', 'shared', 'media_type', 'media_description');
        $fields['content'] = file_get_contents(base64_decode($photo));
        if ($shared == 1) {
            $fields['shared_at'] = date('Y-m-d H:i:s');
        }
        return addNewRecord('media', $fields);
    }
}

function updateRss($xmlUrl) {
    $xmlContent = '<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
<channel>
    <title>CHiM Feed RSS page</title>
    <link>localhost/CHiM/feed</link>
    <description>Childcare Manager</description>';
    $media = getFeedMedia();
    $finfo = finfo_open();
    foreach ($media as $item) {
        $fileUrl = getFileUrl($item['content'], getFileType($item['content']));
        $xmlContent .= '
    <item>
        <title>' . $item['id'] . '</title>
        <link>localhost/CHiM/feed</link>
        <description>' . $item['media_description'] . '</description>
        <enclosure url="' . $fileUrl . '" length="' . strlen($item['content']) . '" type="' . finfo_buffer($finfo, $item['content'], FILEINFO_MIME_TYPE) . '" />
    </item>';
    }
    $xmlContent .= '
</channel>
</rss>';
    file_put_contents($xmlUrl, $xmlContent);
    header('Content-Type: application/rss+xml; charset=utf-8');
}

function getFileUrl($file, $type) {
    $tempFilePath = $_SERVER['DOCUMENT_ROOT'] . '/CHiM/views/users/temp_storage/' . uniqid('file_') . $type;
    file_put_contents($tempFilePath, $file);
    return $tempFilePath;
}

function getFileType($file) {
    $finfo = finfo_open();
    $mimeType = finfo_buffer($finfo, $file, FILEINFO_MIME_TYPE);
    finfo_close($finfo);
    switch ($mimeType) {
        case 'image/jpeg': return '.jpg';
        case 'image/png': return '.png';
        case 'image/gif': return '.gif';
        case 'video/mp4': return '.mp4';
        case 'video/mkv': return '.mkv';
        default: return '.jpg';
    }
}

function loggedIn() {
    return isset($_SESSION['user_id']);
}

function cleanInput($data) {
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>