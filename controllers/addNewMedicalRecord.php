<?php 
require_once dirname(__DIR__) . '/config.php';
require_once ROOT_PATH . "models/database.php";
    if(isset($_POST['docName']) && isset($_POST['diagnosis']) && isset($_POST['date']) && isset($_POST['treatment'])){
        addNewMedicalRecordWithChildId($_SESSION['child_id'], $_POST['docName'], $_POST['diagnosis'], $_POST['date'], $_POST['treatment']);
    }
    else {
        http_response_code(400);
        echo "</br>Unset params (add new medical record)";
    }
?>