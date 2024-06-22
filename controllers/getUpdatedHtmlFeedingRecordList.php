<?php
    require_once "..\..\CHiM\controllers\includes\database.php";
    if(isset($_POST['weekday'])){
        $updatedRecordList = getFeedingRecords($_SESSION['child_id'], $_POST['weekday']);
        $newRecordList = '';
        foreach ($updatedRecordList as $record) {
            $newRecordList .= '<div class="pr-schedule-record">';
            $newRecordList .= '<span>' . substr($record['record_time'], 0, 5) . '</span>';
            $newRecordList .= '<span>' . $record['rec_description'] . '</span>';
            $newRecordList .= '<button type="button" class="pr-record-delete-button" onclick="deleteFeedingRecord(\'' . $_POST['weekday'] . '\', \'' . $record['id'] . '\')"></button>';
            $newRecordList .= '</div>';
        }
        echo $newRecordList;
    }
    else {
        http_response_code(400);
        echo "Invalid params (get updated html records list)";
    }
?>