<?php
    require_once "..\..\CHiM\controllers\includes\database.php";
    if(isset($_POST['id'])){
        deleteMedicalRecord($_POST['id'], $_SESSION['child_id']);
    }
    else {
        http_response_code(400);
        echo "Invalid params (delete medical record)";
    }
?>