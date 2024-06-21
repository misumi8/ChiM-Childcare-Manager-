<?php 
    require_once "..\..\CHiM\controllers\includes\database.php";
    if(isset($_POST['name']) &&
        isset($_POST['dob']) &&
        isset($_POST['gender']) &&
        isset($_POST['height']) &&
        isset($_POST['hobby']) &&
        isset($_POST['food'])) {
            $childInfo = getChildInfo($_SESSION['child_id']);
            if($_POST['name'] != $childInfo['fullname']) updateChildName($_SESSION['child_id'], $_POST['name']);
            if($_POST['dob'] != $childInfo['birthday']) updateChildDob($_SESSION['child_id'], $_POST['dob']);
            if($_POST['gender'] != $childInfo['gender']) updateChildGender($_SESSION['child_id'], $_POST['gender']);
            if($_POST['height'] != $childInfo['height']) updateChildHeight($_SESSION['child_id'], $_POST['height']);
            if($_POST['hobby'] != $childInfo['fav_hobby']) updateChildHobby($_SESSION['child_id'], $_POST['hobby']);
            if($_POST['food'] != $childInfo['fav_food']) updateChildFood($_SESSION['child_id'], $_POST['food']);
    }   
    else {
        http_response_code(400);
        echo "Invalid params (childInfoUpdate)";
    }
?>