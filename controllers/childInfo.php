<?php
    //require_once "../CHiM/models/database2.php";
    $childInfo = getChildInfo($_SESSION['child_id']);
    $childPic = getChildPic($_SESSION['child_id']);
    $photoExist = !empty($childPic) ? 1 : 0;
    $childDOB = $childInfo['birthday'] != null ? new DateTime($childInfo['birthday']) : new DateTime();
    $today = new DateTime();
    $childAge = ($childDOB->diff($today))->y; // -> y = int years
    $childAgeMonths =  ($childDOB->diff($today))->m;
    $childDOB = $childDOB->format('d.m.Y');
    $childMemories = getChildMemories($_SESSION['child_id']);
    $userChildrenList = getUserChildrenInfo($_SESSION['user_id']);

    $feedingRecordsSunday = getFeedingRecords($_SESSION['child_id'], "sunday");
    $feedingRecordsMonday = getFeedingRecords($_SESSION['child_id'], "monday");
    $feedingRecordsTuesday = getFeedingRecords($_SESSION['child_id'], "tuesday");
    $feedingRecordsWednesday = getFeedingRecords($_SESSION['child_id'], "wednesday");
    $feedingRecordsThursday = getFeedingRecords($_SESSION['child_id'], "thursday");
    $feedingRecordsFriday = getFeedingRecords($_SESSION['child_id'], "friday");
    $feedingRecordsSaturday = getFeedingRecords($_SESSION['child_id'], "saturday");

    $sleepingRecordsSunday = getSleepingRecords($_SESSION['child_id'], "sunday");
    $sleepingRecordsMonday = getSleepingRecords($_SESSION['child_id'], "monday");
    $sleepingRecordsTuesday = getSleepingRecords($_SESSION['child_id'], "tuesday");
    $sleepingRecordsWednesday = getSleepingRecords($_SESSION['child_id'], "wednesday");
    $sleepingRecordsThursday = getSleepingRecords($_SESSION['child_id'], "thursday");
    $sleepingRecordsFriday = getSleepingRecords($_SESSION['child_id'], "friday");
    $sleepingRecordsSaturday = getSleepingRecords($_SESSION['child_id'], "saturday");
?>