<?php
require_once dirname(__DIR__) . '/config.php';
require_once ROOT_PATH . "models/database.php";

    if (isset($_POST['child_id'])) {
        $_SESSION['child_id'] = $_POST['child_id']; 
    }
    else {
        http_response_code(400);
        echo "Invalid param (sessionChildIdUpdate)";
    }
?>