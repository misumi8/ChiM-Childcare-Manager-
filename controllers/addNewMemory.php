<?php
    require_once "..\..\CHiM\controllers\includes\database.php";
    if (isset($_POST['important']) && isset($_POST['content']) && isset($_POST['description'])) {
        $important = $_POST['important'];
        $content = base64_encode($_POST['content']);
        $description = $_POST['description'];
        addChildMemory($_SESSION['child_id'], $_SESSION['user_id'], "0", "type", $content, $description, $important);
    }
    else {
        http_response_code(400);
        echo "</br>Invalid params (add new memory)";
    }
?>