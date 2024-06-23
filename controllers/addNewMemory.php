<?php
    require_once "..\..\CHiM\controllers\includes\database.php";
    if (isset($_POST['shared']) && isset($_POST['important']) && isset($_POST['content']) && isset($_POST['description'])) {
        $content = base64_encode($_POST['content']);
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $fileType = $finfo->file($_POST['content']);
        addChildMemory($_SESSION['child_id'], $_SESSION['user_id'], $_POST['shared'], strstr($fileType, 'image') ? 'img' : 'video', $content, $_POST['description'], $_POST['important']);
    }
    else {
        http_response_code(400);
        echo "</br>Invalid params (add new memory)";
    }
?>