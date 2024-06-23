<?php
    //session_start();

    // TEMP (until login is done):
    //$_SESSION['user_id'] = '8'; // instantiat from login / register
    //if(empty($_SESSION['child_id'])) $_SESSION['child_id'] = '1'; // initially, must be the first child of the user_id
    //

    function getFirstMetChildId($userId) {
        $stmt = $GLOBALS['pdo']->prepare("SELECT id FROM children where user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }

    function addNewChild($userId){
        $stmt = $GLOBALS['pdo']->prepare("SELECT max(id) as id FROM children");
        $stmt->execute();
        $newChildId = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = $GLOBALS['pdo']->prepare("INSERT INTO children (user_id, id) VALUES (?, ?)");
        $stmt->execute([$userId, $newChildId['id'] + 1]);
        return $newChildId['id'] + 1;
    }

    function getChildInfo($child_id){
        $stmt = $GLOBALS['pdo']->prepare("SELECT id, user_id, fullname, birthday, height, gender, fav_food, fav_hobby, photo FROM children WHERE id = ?");
        $stmt->execute([$child_id]);
        $childInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        return $childInfo;
    }

    function getChildPic($child_id){
        $stmt = $GLOBALS['pdo']->prepare("SELECT photo FROM children WHERE id = ?");
        $stmt->execute([$child_id]);
        $childPic = $stmt->fetch(PDO::FETCH_ASSOC);
        return $childPic['photo'] == null ? base64_encode("") : base64_encode($childPic['photo']);
    }

    function setChildPic($child_id, $photo) {
        $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET photo = ? WHERE id = ?");
        $stmt->execute([file_get_contents($photo), $child_id]); // file_get_contents - returns the file in a string
        //return "DONE;";
    }

    function getChildMemories($child_id){
        $stmt = $GLOBALS['pdo']->prepare("SELECT content, media_description, important FROM media WHERE child_id = ?");
        $stmt->execute([$child_id]);
        $childMemories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $childMemories;
    }

    function addChildMemory($childId, $userId, $shared, $type, $photo, $description, $important){
        if(isset($photo) && !empty($photo)){
            if($shared == 1) {
                $stmt = $GLOBALS['pdo']->prepare("INSERT INTO media(child_id, user_id, important, shared, media_type, content, media_description, shared_at) values(?,?,?,?,?,?,?, CURRENT_TIMESTAMP)");
                $stmt->execute([$childId, $userId, $important, $shared, $type, file_get_contents(base64_decode($photo)), $description]);
            } 
            else {
                $stmt = $GLOBALS['pdo']->prepare("INSERT INTO media(child_id, user_id, important, shared, media_type, content, media_description) values(?,?,?,?,?,?,?)");
                $stmt->execute([$childId, $userId, $important, $shared, $type, file_get_contents(base64_decode($photo)), $description]);
            }
        }
    }

    function updateChildName($childId, $fullname){
        $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET fullname = ? WHERE id = ?");
        $stmt->execute([$fullname, $childId]);
    }

    function updateChildDob($childId, $dob){
        $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET birthday = ? WHERE id = ?");
        $stmt->execute([$dob, $childId]);
    }

    function updateChildHeight($childId, $height){
        $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET height = ? WHERE id = ?");
        $stmt->execute([$height, $childId]);
    }

    function updateChildGender($childId, $gender){
        $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET gender = ? WHERE id = ?");
        $stmt->execute([$gender, $childId]);
    }

    function updateChildHobby($childId, $favHobby){
        $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET fav_hobby = ? WHERE id = ?");
        $stmt->execute([$favHobby, $childId]);
    }

    function updateChildFood($childId, $favFood){
        $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET fav_food = ? WHERE id = ?");
        $stmt->execute([$favFood, $childId]);
    }

    function addNewFeedingRecord($weekday, $time, $text){
        $stmt = $GLOBALS['pdo']->prepare("INSERT INTO feeding_records(child_id, rec_weekday, record_time, rec_description) values(?,?,?,?)");
        $stmt->execute([$_SESSION['child_id'], $weekday, $time, $text]);
    }

    function addNewSleepingRecord($weekday, $startTime, $endTime, $text){
        $stmt = $GLOBALS['pdo']->prepare("INSERT INTO sleeping_records(child_id, rec_weekday, start_time, end_time, rec_description) values(?,?,?,?,?)");
        $stmt->execute([$_SESSION['child_id'], $weekday, $startTime, $endTime, $text]);
    }

    function getFeedingRecords($child_id, $weekday){
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM feeding_records WHERE child_id = ? and rec_weekday = ? ORDER BY record_time ASC");
        $stmt->execute([$child_id, $weekday]);
        $feedingRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $feedingRecords;
    }

    function getSleepingRecords($child_id, $weekday){
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM sleeping_records WHERE child_id = ? and rec_weekday = ? ORDER BY start_time ASC");
        $stmt->execute([$child_id, $weekday]);
        $feedingRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $feedingRecords;
    }

    function deleteFeedingRecord($recordId){
        $stmt = $GLOBALS['pdo']->prepare("DELETE FROM feeding_records WHERE id = ?");
        $stmt->execute([$recordId]);
    }

    function deleteSleepingRecord($recordId){
        $stmt = $GLOBALS['pdo']->prepare("DELETE FROM sleeping_records WHERE id = ?");
        $stmt->execute([$recordId]);
    }
?>