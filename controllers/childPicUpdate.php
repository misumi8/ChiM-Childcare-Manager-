<?php
    require_once "..\..\CHiM\models\database.php";
    if (isset($_POST['child_id']) && isset($_POST['photo'])) {
        $child_id = $_POST['child_id'];
        $photo_base64 = $_POST['photo'];
        $result = setChildPic($child_id, $photo_base64);
    }
    else {
        http_response_code(400);
        echo "Invalid params (childPicUpdate)";
    }
?>
