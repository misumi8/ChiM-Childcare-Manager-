<?php
    //require_once "../CHiM/models/database2.php";
    $childInfo = getChildInfo($_SESSION['child_id']);
    $childPic = getChildPic($_SESSION['child_id']);
    $photoExist = !empty($childPic) ? 1 : 0;
    $childDOB = new DateTime($childInfo['birthday']);
    $today = new DateTime();
    $childAge = ($childDOB->diff($today))->y; // -> y = int years
    $childAgeMonths =  ($childDOB->diff($today))->m;
    $childDOB = $childDOB->format('d.m.Y');
    $childMemories = getChildMemories($_SESSION['child_id']);
    $userChildrenList = getUserChildrenInfo($_SESSION['user_id']);
?>