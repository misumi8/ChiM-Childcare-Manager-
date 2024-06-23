<?php
    require_once "..\..\CHiM\controllers\includes\database.php";
    //echo $_SESSION['child_id'];
    $newChildId = addNewChild($_SESSION['user_id']);
    $_SESSION['child_id'] = $newChildId;
    //echo $_SESSION['child_id'];
?>