<?php
    require_once dirname(__DIR__) . '/config.php';
require_once ROOT_PATH . "models/database.php";
    if(isset($_POST['id'])){
        deleteMedicalRecordById($_POST['id']);
    }
    else {
        http_response_code(400);
        echo "Invalid params (delete medical record)";
    }
?>