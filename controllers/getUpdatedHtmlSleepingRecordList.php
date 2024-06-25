<?php
    require_once "..\..\CHiM\models\database.php";
    if(isset($_POST['weekday'])){
        $updatedRecordList = getSleepingRecords($_SESSION['child_id'], $_POST['weekday']);
        $newRecordList = '';
        foreach ($updatedRecordList as $record) {
            $newRecordList .= '<div class="pr-schedule-record">';
            $newRecordList .= '<span>' . substr($record['start_time'], 0, 5) . '</span>';
            $newRecordList .= '<span>-</span>';
            $newRecordList .= '<span>' . substr($record['end_time'], 0, 5) . '</span>';
            $newRecordList .= '<span>' . $record['rec_description'] . '</span>';
            $newRecordList .= '<button type="button" class="pr-record-delete-button" onclick="deleteSleepingRecord(\'' . $_POST['weekday'] . '\', \'' . $record['id'] . '\')"></button>';
            $newRecordList .= '</div>';
        }
        echo $newRecordList;
    }
    else {
        http_response_code(400);
        echo "Invalid params (get updated html records list)";
    }
?>