<?php
    require_once "..\..\CHiM\models\database.php";
    //echo $_SESSION['child_id'];
    if(isset($_POST['name']) &&
        isset($_POST['dob']) &&
        isset($_POST['gender']) &&
        isset($_POST['height']) &&
        isset($_POST['hobby']) &&
        isset($_POST['food'])) {
            $newChildId = addNewChild($_SESSION['user_id'], $_POST['name'], $_POST['dob'], $_POST['gender'], $_POST['height'], $_POST['hobby'], $_POST['food']);
            $_SESSION['child_id'] = $newChildId;
        }
    else {
        http_response_code(400);
        echo "Invalid params (childInfoUpdate)";
    }
    //echo $_SESSION['child_id'];
?>