<?php
    require_once "..\..\CHiM\models\database.php";
    if(isset($_POST['id'])){
        deleteFeedingRecord($_POST['id']);
    }
    else {
        http_response_code(400);
        echo "Invalid params (delete feeding record)";
    }
?>