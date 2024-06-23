<?php 
    require_once "..\..\CHiM\controllers\includes\database.php";
    if(isset($_POST['docName']) && isset($_POST['diagnosis']) && isset($_POST['date']) && isset($_POST['treatment'])){
        addNewMedicalRecord($_POST['docName'], $_POST['diagnosis'], $_POST['date'], $_POST['treatment']);
    }
    else {
        http_response_code(400);
        echo "</br>Unset params (add new medical record)";
    }
?>