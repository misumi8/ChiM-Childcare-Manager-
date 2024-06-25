<?php 
    require_once "..\..\CHiM\models\database.php";
    if(isset($_POST['record-time']) && isset($_POST['record-text']) && isset($_POST['weekday'])){
        echo "success";
        addNewFeedingRecord($_POST['weekday'], $_POST['record-time'], $_POST['record-text']);
        echo "success";
    }
    else {
        http_response_code(400);
        echo "</br>Unset params (add new record)";
    }
?>