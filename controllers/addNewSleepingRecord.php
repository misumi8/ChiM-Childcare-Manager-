<?php 
    require_once "..\..\CHiM\controllers\includes\database.php";
    if(isset($_POST['record-text']) && isset($_POST['start-time']) && isset($_POST['end-time']) && isset($_POST['weekday'])){
        echo "success";
        addNewSleepingRecord($_POST['weekday'], $_POST['start-time'], $_POST['end-time'], $_POST['record-text']);
        echo "success";
    }
    else {
        http_response_code(400);
        echo "Unset params (add new sleeping record)";
    }
?>