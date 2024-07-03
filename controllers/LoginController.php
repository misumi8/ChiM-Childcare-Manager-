<?php
require_once dirname(__DIR__) . '/config.php';

require_once ROOT_PATH . 'models/database.php';
require_once ROOT_PATH . 'models/UserModel.php';

class LoginController {
    public function login($email, $password) {
        $email = $this->cleanInput($email);
        $password = $this->cleanInput($password);

        $userInfo = UserModel::getUserInfo($email, $password);
        if ($userInfo) {
            $_SESSION['userInfo'] = $userInfo;
            $_SESSION['user_id'] = $userInfo['id'];
            $_SESSION['child_id'] = UserModel::getFirstMetChildId($userInfo['id']);
            header("Location: /CHiM/profile?id=" . $userInfo['id']);
        } else {
            $_SESSION['login_errors'] = "Invalid email or password.";
            header("Location: /CHiM/login");
        }
        exit();
    }

    private function cleanInput($data) {
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>
