<?php
require_once dirname(__DIR__) . '/config.php';

require_once ROOT_PATH . 'models/database.php';
require_once ROOT_PATH . 'models/UserModel.php';

class RegisterController {
    public function register($email, $password, $fname, $lname, $dob) {
        $email = $this->cleanInput($email);
        $password = $this->cleanInput($password);
        $fname = $this->cleanInput($fname);
        $lname = $this->cleanInput($lname);
        $dob = $this->cleanInput($dob);

        if (empty($email) || empty($password) || empty($fname) || empty($lname) || empty($dob)) {
            header("Location: /CHiM/register");
            exit();
        }

        if (UserModel::registerNewUser($email, $password, $fname, $lname, $dob)) {
            $userInfo = UserModel::getUserInfo($email, $password);
            $_SESSION['userInfo'] = $userInfo;
            $_SESSION['user_id'] = $userInfo['id'];
            $_SESSION['child_id'] = UserModel::getFirstMetChildId($userInfo['id']);
            header("Location: /CHiM/profile?id=" . $userInfo['id']);
        } else {
            header("Location: /CHiM/register");
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
