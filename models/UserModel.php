<?php
require_once 'database.php';

class UserModel {
    public static function getUserInfo($email, $user_password) {
        $userInfo = Database::fetchOne("SELECT id, email, user_password, fname, lname, birthday, profile_pic, isAdmin FROM users WHERE email = ?", [$email]);
        if ($userInfo && password_verify($user_password, $userInfo['user_password'])) {
            unset($userInfo['user_password']);
            $userChildrenInfo = self::getUserChildrenInfo($userInfo['id']);
            $userInfo['children'] = $userChildrenInfo;
            return $userInfo;
        }
        return null;
    }

    public static function getUserChildrenInfo($userId) {
        return Database::fetch("SELECT * FROM children WHERE user_id = ?", [$userId]);
    }

    public static function doesEmailExist($email) {
        $count = Database::fetchOne("SELECT count(*) as count FROM users WHERE email = ?", [$email])['count'];
        return $count > 0;
    }

    public static function getFirstMetChildId($userId) {
        return Database::fetchOne("SELECT id FROM children WHERE user_id = ?", [$userId])['id'];
    }

    public static function registerNewUser($email, $user_password, $fname, $lname, $birthday) {
        if (self::doesEmailExist($email)) {
            return false;
        }
        $hashed_pass = password_hash($user_password, PASSWORD_DEFAULT);
        return Database::execute("INSERT INTO users (email, user_password, fname, lname, birthday) VALUES (?, ?, ?, ?, ?)", [$email, $hashed_pass, $fname, $lname, $birthday]);
    }

    public static function getAllUsers($search = "", $limit = 5, $offset = 0) {
        $params = [];
        $sql = "SELECT id, email FROM users";

        if(!empty($search)) {
            $sql .= " WHERE email LIKE ? OR fname LIKE ? OR lname LIKE ?";
            $params = ["%$search%", "%$search%", "%$search%"];
        }

        $sql .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;

        return Database::fetch($sql, $params);
    }
    
    public static function getUserInfoById($userId) {
        return Database::fetchOne("SELECT id, email, fname, lname, birthday FROM users WHERE id = ?", [$userId]);
    }

    public static function updateUser($userId, $fields) {
        $setClause = implode(", ", array_map(function($field) { return "$field = ?"; }, array_keys($fields)));
        $params = array_values($fields);
        $params[] = $userId;
        $sql = "UPDATE users SET $setClause WHERE id = ?";
        return Database::execute($sql, $params);
    }

    public static function deleteUserById($userId) {
        return deleteUserById($userId);
    }

    public static function deleteChildById($childId) {
        return deleteChildById($childId);
    }
    
    public static function deleteMediaById($id){
        return deleteMediaById($id);
    }
    
}
?>