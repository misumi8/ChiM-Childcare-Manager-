<?php 
require_once dirname(__DIR__) . '/config.php';
require_once ROOT_PATH . "models/database.php";

    if(isset($_POST['name']) &&
        isset($_POST['dob']) &&
        isset($_POST['gender']) &&
        isset($_POST['height']) &&
        isset($_POST['hobby']) &&
        isset($_POST['food'])) {
            $childId = $_SESSION['child_id'];
            $childInfo = getChildInfo($childId);
            
            $fieldsToUpdate = [];
            
            if ($_POST['name'] != $childInfo['fullname']) {
                $fieldsToUpdate['fullname'] = $_POST['name'];
            }
            if ($_POST['dob'] != $childInfo['birthday']) {
                $fieldsToUpdate['birthday'] = $_POST['dob'];
            }
            if ($_POST['gender'] != $childInfo['gender']) {
                $fieldsToUpdate['gender'] = $_POST['gender'];
            }
            if ($_POST['height'] != $childInfo['height']) {
                $fieldsToUpdate['height'] = $_POST['height'];
            }
            if ($_POST['hobby'] != $childInfo['fav_hobby']) {
                $fieldsToUpdate['fav_hobby'] = $_POST['hobby'];
            }
            if ($_POST['food'] != $childInfo['fav_food']) {
                $fieldsToUpdate['fav_food'] = $_POST['food'];
            }
            
            if (!empty($fieldsToUpdate)) {
                updateChild($childId, $fieldsToUpdate);
            }
            
    }   
    else {
        http_response_code(400);
        echo "Invalid params (childInfoUpdate)";
    }
?>