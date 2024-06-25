<?php
    require_once "..\..\CHiM\models\database.php";
    if (isset($_POST['child_id'])) {
        $_SESSION['child_id'] = $_POST['child_id']; 
    }
    else {
        http_response_code(400);
        echo "Invalid param (sessionChildIdUpdate)";
    }
?>