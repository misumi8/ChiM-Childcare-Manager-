<?php
    require_once "..\..\CHiM\controllers\includes\database.php";
    $updatedRecordList = getMedicalRecords($_SESSION['child_id'], $_SESSION['user_id']);
    $newRecordList = '';
    foreach ($updatedRecordList as $record) {
        $newRecordList .= '<tr class="row">';
        $newRecordList .= '<td><textarea class="pr-table-cell" readonly>' . $record['doctor_name'] . '</textarea></td>';
        $newRecordList .= '<td>
                    <textarea class="pr-table-cell" readonly>' . $record['diagnosis'] . '</textarea>';
        $newRecordList .= '<input requred type="date" 
                    class="pr-medical-record-date" 
                    name="medical-record-date" 
                    placeholder="Date of record"
                    value="' . $record['record_date'] . '"
                    disabled/>';  
        $newRecordList .= '</td><td>';
        $newRecordList .= '<button type="button" class="pr-delete-medical-record" onclick="deleteMedicalRecord(\'' . $record['id'] . '\')"></button>'
                        . '<textarea class="pr-table-cell" readonly>' . $record['treatment'] . '</textarea>
                    </td>                                            
                </tr>';
    }
    $newRecordList .= '<tr class="row pr-new-medical-record" style="display: contents;">
                <td>
                    <textarea class="pr-table-cell pr-new-doc-name" maxlength="50" placeholder="Doctor name"></textarea>
                </td>
                <td>
                    <textarea class="pr-table-cell pr-new-diagnosis" maxlength="150" placeholder="Diagnosis"></textarea>
                    <input requred type="date" 
                        class="pr-medical-record-date pr-new-med-rec-date" 
                        name="medical-record-date" 
                        placeholder="Date of record"
                    />  
                </td>
                <td>
                    <textarea class="pr-table-cell pr-new-treatment" maxlength="300" placeholder="Treatment"></textarea>
                </td>
            </tr>';
    echo $newRecordList;
?>