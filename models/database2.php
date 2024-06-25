<?php

    // TEMP (until login is done):
    //$_SESSION['user_id'] = '8'; // instantiat from login / register
    //if(empty($_SESSION['child_id'])) $_SESSION['child_id'] = '1'; // initially, must be the first child of the user_id
    //deleteMedicalRecordById

    function updateMedicalRecord($id, $child_id, $user_id, $doctor_name, $diagnosis, $treatment, $record_date){
        $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM users where id = ?");
        $stmt->execute([$user_id]);
        if($stmt->fetch(PDO::FETCH_ASSOC)['count'] < 1) return [400, "Inexistent user id."];
        $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM children where id = ?");
        $stmt->execute([$child_id]);
        if($stmt->fetch(PDO::FETCH_ASSOC)['count'] < 1) return [400, "Inexistent child id."];
        else if(strlen($doctor_name) > 50) return [400, "Maximum length for doctor_name is 50."];
        else if(strlen($diagnosis) > 150) return [400, "Maximum length for diagnosis is 150."];
        else if(strlen($treatment) > 300) return [400, "Maximum length for treatment is 300."];
        if($id != null){
            $stmt = $GLOBALS['pdo']->prepare("UPDATE medical_records SET id = ? where id = ?");
            $stmt->execute([$id, $id]);
        }
        if($child_id != null){
            $stmt = $GLOBALS['pdo']->prepare("UPDATE medical_records SET child_id = ? where id = ?");
            $stmt->execute([$child_id, $id]);
        }
        if($user_id != null){
            $stmt = $GLOBALS['pdo']->prepare("UPDATE medical_records SET user_id = ? where id = ?");
            $stmt->execute([$user_id, $id]);
        }
        if($doctor_name != null){
            $stmt = $GLOBALS['pdo']->prepare("UPDATE medical_records SET doctor_name = ? where id = ?");
            $stmt->execute([$doctor_name, $id]);
        }
        if($diagnosis != null){
            $stmt = $GLOBALS['pdo']->prepare("UPDATE medical_records SET diagnosis = ? where id = ?");
            $stmt->execute([$diagnosis, $id]);
        }
        if($treatment != null){
            $stmt = $GLOBALS['pdo']->prepare("UPDATE medical_records SET treatment = ? where id = ?");
            $stmt->execute([$treatment, $id]);
        }
        if($record_date != null){
            $stmt = $GLOBALS['pdo']->prepare("UPDATE medical_records SET record_date = ? where id = ?");
            $stmt->execute([$record_date, $id]);
        }
        return [200, "Success. Medical record updated successfully"];
    }

    function updateSleepingRecord($id, $child_id, $rec_weekday, $start_time, $end_time, $rec_description){
        $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM children where id = ?");
        $stmt->execute([$child_id]);
        if($stmt->fetch(PDO::FETCH_ASSOC)['count'] < 1) return [400, "Inexistent child id."];
        if(strtotime($start_time) >= strtotime($end_time)) return [400, "start_time must be before the end_time."];
        if($rec_description != null && strlen($rec_description) > 50) return [400, "Max. length of descriptin is 50."];
        if(in_array($rec_weekday, ["sunday, monday, tuesday, wednesday, thursday, friday, saturday"])) 
            return [400, "Incorrect weekday (must be one of the following: sunday, monday, tuesday, wednesday, thursday, friday, saturday)"];
        
        if($id != null){
            $stmt = $GLOBALS['pdo']->prepare("UPDATE sleeping_records SET id = ? where id = ?");
            $stmt->execute([$id, $id]);
        }
        if($child_id != null){
            $stmt = $GLOBALS['pdo']->prepare("UPDATE sleeping_records SET child_id = ? where id = ?");
            $stmt->execute([$child_id, $id]);
        }
        if($rec_weekday) {
            $stmt = $GLOBALS['pdo']->prepare("UPDATE sleeping_records SET rec_weekday = ? where id = ?");
            $stmt->execute([$rec_weekday, $id]);
        }
        if($start_time) {
            $stmt = $GLOBALS['pdo']->prepare("UPDATE sleeping_records SET start_time = ? where id = ?");
            $stmt->execute([$start_time, $id]);
        }
        if($end_time) {
            $stmt = $GLOBALS['pdo']->prepare("UPDATE sleeping_records SET end_time = ? where id = ?");
            $stmt->execute([$end_time, $id]);
        }
        if($rec_description) {
            $stmt = $GLOBALS['pdo']->prepare("UPDATE sleeping_records SET rec_description = ? where id = ?");
            $stmt->execute([$rec_description, $id]);
        }
        return [200, "Success. Sleeping record updated successfully"];
    }

    function updateFeedingRecord($id, $child_id, $rec_weekday, $record_time, $rec_description){
        $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM children where id = ?");
        $stmt->execute([$child_id]);
        if($stmt->fetch(PDO::FETCH_ASSOC)['count'] < 1) return [400, "Inexistent child id."];
        if($rec_description != null && strlen($rec_description) > 50) return [400, "Max. length of descriptin is 50."];
        if(in_array($rec_weekday, ["sunday, monday, tuesday, wednesday, thursday, friday, saturday"])) 
            return [400, "Incorrect weekday (must be one of the following: sunday, monday, tuesday, wednesday, thursday, friday, saturday)"];
        
        if($id != null){
            $stmt = $GLOBALS['pdo']->prepare("UPDATE feeding_records SET id = ? where id = ?");
            $stmt->execute([$id, $id]);
        }
        if($child_id != null){
            $stmt = $GLOBALS['pdo']->prepare("UPDATE feeding_records SET child_id = ? where id = ?");
            $stmt->execute([$child_id, $id]);
        }
        if($rec_weekday) {
            $stmt = $GLOBALS['pdo']->prepare("UPDATE feeding_records SET rec_weekday = ? where id = ?");
            $stmt->execute([$rec_weekday, $id]);
        }
        if($record_time) {
            $stmt = $GLOBALS['pdo']->prepare("UPDATE feeding_records SET record_time = ? where id = ?");
            $stmt->execute([$record_time, $id]);
        }
        if($rec_description) {
            $stmt = $GLOBALS['pdo']->prepare("UPDATE feeding_records SET rec_description = ? where id = ?");
            $stmt->execute([$rec_description, $id]);
        }
        return [200, "Success. Feeding record updated successfully"];
    }

    function updateChild($id, $user_id, $fullname, $birthday, $height, $gender, $fav_food, $fav_hobby){
        try{    
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM children where id = ?");
            $stmt->execute([$id]);
            
            if($fullname != null && !preg_match('/[a-zA-Z]$/', $fullname)){
                return [400, "Name must contain only upper case and lower case letters."];
            }
            if($height != null && intval($height) < 22 || intval($height) > 300){
                return [400, "Height must be between 22 and 300."];
            }
            if($gender != null && $gender != 'Male' && $gender != 'Female') return [400, "Gender must be either 'Male' or 'Female'."];
        
            if($stmt->fetch(PDO::FETCH_ASSOC)['count'] < 1) {
                $stmt = $GLOBALS['pdo']->prepare("INSERT INTO users (id, user_id, fullname, birthday, height, gender, fav_food, fav_hobby) VALUES  (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$id, $user_id, $fullname, $birthday, $height, $gender, $fav_food, $fav_hobby]);
                return [200, "User successfully inserted."];
            }

            $stmtUser = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM users where id = ?");
            $stmtUser->execute([$user_id]);

            if($id != null){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET id = ? where id = ?");
                $stmt->execute([$id, $id]);
            }
            if($user_id != null && $stmtUser->fetch(PDO::FETCH_ASSOC)['count'] < 1){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET user_id = ? where id = ?");
                $stmt->execute([$user_id, $id]);
            }
            if($fullname != null){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET fullname = ? where id = ?");
                $stmt->execute([$fullname, $id]);
            }
            if($birthday != null){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET birthday = ? where id = ?");
                $stmt->execute([$birthday, $id]);
            }
            if($height != null){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET height = ? where id = ?");
                $stmt->execute([$height, $id]);
            }
            if($gender != null){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET gender = ? where id = ?");
                $stmt->execute([$gender, $id]);
            }
            if($fav_food != null){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET fav_food = ? where id = ?");
                $stmt->execute([$fav_food, $id]);
            }
            if($fav_hobby != null){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET fav_hobby = ? where id = ?");
                $stmt->execute([$fav_hobby, $id]);
            }
            return [200, "Child successfully updated."];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function updateUser($id, $email, $user_password, $fname, $lname, $birthday){
        try{
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM users where id = ?");
            $stmt->execute([$id]);
            if($email != null && !preg_match('/^[a-zA-Z0-9._]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/', $email)){
                return [400, "Invalid email address"];
            }
            else if($user_password != null && strlen($user_password) < 8){
                return [400, "Password must contain at least 8 characters"];
            }

            if($stmt->fetch(PDO::FETCH_ASSOC)['count'] < 1) {
                $stmt = $GLOBALS['pdo']->prepare("INSERT INTO users (id, email, user_password, fname, lname, birthday) VALUES  (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$id, $email, password_hash($user_password, PASSWORD_DEFAULT), $fname, $lname, $birthday]);
                return [200, "User successfully inserted."];
            }

            if($email != null){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE users SET email = ? where id = ?");
                $stmt->execute([$email, $id]);
            }
            if($user_password != null){
                $hashed_pass = password_hash($user_password, PASSWORD_DEFAULT);
                $stmt = $GLOBALS['pdo']->prepare("UPDATE users SET user_password = ? where id = ?");
                $stmt->execute([$hashed_pass, $id]);
            }
            if($fname != null){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE users SET fname = ? where id =?");
                $stmt->execute([$fname, $id]);
            }
            if($lname != null){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE users SET lname = ? where id = ?");
                $stmt->execute([$lname, $id]);
            }
            if($birthday != null){
                $stmt = $GLOBALS['pdo']->prepare("UPDATE users SET birthday = ? where id = ?");
                $stmt->execute([$birthday, $id]);
            }
            return [200, "User successfully updated."];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function addNewMedicalRecordWithChildId($child_id, $user_id, $doctor_name, $diagnosis, $treatment, $record_date){
        try {
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM users where id = ?");
            $stmt->execute([$user_id]);
            if($stmt->fetch(PDO::FETCH_ASSOC)['count'] < 1) return [400, "Inexistent user id."];
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM children where id = ?");
            $stmt->execute([$child_id]);
            if($stmt->fetch(PDO::FETCH_ASSOC)['count'] < 1) return [400, "Inexistent child id."];
            else if(strlen($doctor_name) > 50) return [400, "Maximum length for doctor_name is 50."];
            else if(strlen($diagnosis) > 150) return [400, "Maximum length for diagnosis is 150."];
            else if(strlen($treatment) > 300) return [400, "Maximum length for treatment is 300."];
            $stmt = $GLOBALS['pdo']->prepare("INSERT INTO medical_records(child_id, user_id, doctor_name, diagnosis, treatment, record_date) values(?,?,?,?,?,?)");
            $stmt->execute([$child_id, $user_id, $doctor_name, $diagnosis, $treatment, $record_date]);
            return [200, "Success. Medical record is now added to the child with id " . $child_id];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function addNewSleepingRecordWithChildId($child_id, $rec_weekday, $start_time, $end_time, $rec_description){
        try {
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM children where id = ?");
            $stmt->execute([$child_id]);
            if($stmt->fetch(PDO::FETCH_ASSOC)['count'] < 1) return [400, "Inexistent child id."];
            if(strtotime($start_time) >= strtotime($end_time)) return [400, "start_time must be before the end_time."];
            if(in_array($rec_weekday, ["sunday, monday, tuesday, wednesday, thursday, friday, saturday"])) 
                return [400, "Incorrect weekday (must be one of the following: sunday, monday, tuesday, wednesday, thursday, friday, saturday)"];
            $stmt = $GLOBALS['pdo']->prepare("INSERT INTO sleeping_records(child_id, rec_weekday, start_time, end_time, rec_description) values(?,?,?,?,?)");
            $stmt->execute([$child_id, $rec_weekday, $start_time, $end_time, $rec_description]);
            return [200, "Success. Sleeping record is now added to the child with id " . $child_id];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function addNewFeedingRecordWithChildId($child_id, $rec_weekday, $record_time, $rec_description){
        try {
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM children where id = ?");
            $stmt->execute([$child_id]);
            if($stmt->fetch(PDO::FETCH_ASSOC)['count'] < 1) return [400, "Inexistent child id."];
            if(in_array($rec_weekday, ["sunday, monday, tuesday, wednesday, thursday, friday, saturday"])) 
                return [400, "Incorrect weekday (must be one of the following: sunday, monday, tuesday, wednesday, thursday, friday, saturday)"];
            $stmt = $GLOBALS['pdo']->prepare("INSERT INTO feeding_records(child_id, rec_weekday, record_time, rec_description) values(?,?,?,?)");
            $stmt->execute([$child_id, $rec_weekday, $record_time, $rec_description]);
            return [200, "Success. Feeding record is now added to the child with id " . $child_id];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function addNewChildren($user_id, $fullname, $birthday, $height, $gender, $fav_food, $fav_hobby){
        try {
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) as count FROM users where id = ?");
            $stmt->execute([$user_id]);
            if($stmt->fetch(PDO::FETCH_ASSOC)['count'] < 1) return [400, "Inexistent user id."];
            if($gender != 'Male' && $gender != 'Female') return [400, "Gender must be either 'Male' or 'Female'."];
            $stmt = $GLOBALS['pdo']->prepare("INSERT INTO children (user_id, fullname, birthday, height, gender, fav_food, fav_hobby) VALUES  (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$user_id, $fullname, $birthday, $height, $gender, $fav_food, $fav_hobby]);
            return [200, "Success. Children " . $fullname . " is added to the user with id " . $user_id];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function addNewUser($email, $user_password, $fname,	$lname,	$birthday){
        if(!preg_match('/^[a-zA-Z0-9._]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/', $email)){
            return [400, "Invalid email address"];
        }
        else if(strlen($user_password) < 8){
            return [400, "Password must contain at least 8 characters"];
        }
        $hashed_pass = password_hash($user_password, PASSWORD_DEFAULT);
        if (empty(getUserInfo($email, $user_password))) {
            try {
                $stmt = $GLOBALS['pdo']->prepare("INSERT INTO users (email, user_password, fname, lname, birthday) VALUES  (?, ?, ?, ?, ?)");
                $stmt->execute([$email, $hashed_pass, $fname, $lname, $birthday]);
                return [200, "Success. User " . $lname . ' ' . $fname . " is registered now"];
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            return [400, "A user with email " . $email . " and same password already exists."];
        }
    }

    function deleteMedicalRecordById($id) {
        try {
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) FROM medical_records where id = ?");
            $stmt->execute([$id]);
            if($stmt->fetch(PDO::FETCH_ASSOC) < 1) return false;
            $stmt = $GLOBALS['pdo']->prepare("DELETE FROM medical_records WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; 
        }
    }

    function deleteSleepingRecordById($id) {
        try {
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) FROM sleeping_records where id = ?");
            $stmt->execute([$id]);
            if($stmt->fetch(PDO::FETCH_ASSOC) < 1) return false;
            $stmt = $GLOBALS['pdo']->prepare("DELETE FROM sleeping_records WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; 
        }
    }

    function deleteFeedingRecordById($id) {
        try {
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) FROM feeding_records where id = ?");
            $stmt->execute([$id]);
            if($stmt->fetch(PDO::FETCH_ASSOC) < 1) return false;
            $stmt = $GLOBALS['pdo']->prepare("DELETE FROM feeding_records WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; 
        }
    }

    function deleteMediaById($id) {
        try {
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) FROM media where id = ?");
            $stmt->execute([$id]);
            if($stmt->fetch(PDO::FETCH_ASSOC) < 1) return false;
            $stmt = $GLOBALS['pdo']->prepare("DELETE FROM media WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; 
        }
    }


    function deleteChildById($childId) {
        try {
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) FROM children where id = ?");
            $stmt->execute([$childId]);
            if($stmt->fetch(PDO::FETCH_ASSOC) < 1) return false;
            $stmt = $GLOBALS['pdo']->prepare("DELETE FROM children WHERE id = ?");
            $stmt->execute([$childId]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; 
        }
    }

    function deleteUserById($userId) {
        try {
            $stmt = $GLOBALS['pdo']->prepare("SELECT count(*) FROM users where id = ?");
            $stmt->execute([$userId]);
            if($stmt->fetch(PDO::FETCH_ASSOC) < 1) return false;
            $stmt = $GLOBALS['pdo']->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; 
        }
    }

    function getMedicalRecordsByChildId($child_id){
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM medical_records WHERE child_id = ? ORDER BY record_date ASC");
        $stmt->execute([$child_id]);
        $medicalRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $medicalRecords;
    }

    function getAllSleepingRecords($childId){
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM sleeping_records where child_id = ?");
        $stmt->execute([$childId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAllFeedingRecords($childId){
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM feeding_records where child_id = ?");
        $stmt->execute([$childId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getMediaInfoById($id){
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM media where id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getChildInfoByParentId($childId, $userId){
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM children where id = ? and user_id = ?");
        $stmt->execute([$childId, $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getUserInfoById($userId){
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM users where id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getFirstMetChildId($userId) {
        $stmt = $GLOBALS['pdo']->prepare("SELECT id FROM children where user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }
    
    function addNewChild($userId, $name, $dob, $gender, $height, $hobby, $food){
        $stmt = $GLOBALS['pdo']->prepare("SELECT max(id) as id FROM children");
        $stmt->execute();
        $newChildId = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = $GLOBALS['pdo']->prepare("INSERT INTO children (user_id, id, fullname, birthday, height, gender, fav_food, fav_hobby) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([$userId, $newChildId['id'] + 1, $name, $dob, $height, $gender, $food, $hobby]);
        return $newChildId['id'] + 1;
    }

    function getChildInfo($child_id){
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM children WHERE id = ?");
        $stmt->execute([$child_id]);
        $childInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        return $childInfo;
    }

    function getChildPic($child_id){
        $stmt = $GLOBALS['pdo']->prepare("SELECT photo FROM children WHERE id = ?");
        $stmt->execute([$child_id]);
        $childPic = $stmt->fetch(PDO::FETCH_ASSOC);
        return /*$childPic['photo'] == null*/ !isset($childPic['photo']) ? base64_encode("") : base64_encode($childPic['photo']);
    }

    function setChildPic($child_id, $photo) {
        $stmt = $GLOBALS['pdo']->prepare("UPDATE children SET photo = ? WHERE id = ?");
        $stmt->execute([file_get_contents($photo), $child_id]); // file_get_contents - returns the file in a string
        //return "DONE;";
    }

    function getChildMemories($child_id){
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM media WHERE child_id = ?");
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

    function addNewMedicalRecord($docName, $diagnosis, $date, $treatment){
        $stmt = $GLOBALS['pdo']->prepare("INSERT INTO medical_records(child_id, user_id, doctor_name, diagnosis, treatment, record_date) values(?,?,?,?,?,?)");
        $stmt->execute([$_SESSION['child_id'], $_SESSION['user_id'], $docName, $diagnosis, $treatment, $date]);
    }

    function getMedicalRecords($child_id, $user_id){
        $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM medical_records WHERE child_id = ? and user_id = ? ORDER BY record_date ASC");
        $stmt->execute([$child_id, $user_id]);
        $medicalRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $medicalRecords;
    }

    function deleteMedicalRecord($recordId, $childId){
        $stmt = $GLOBALS['pdo']->prepare("DELETE FROM medical_records WHERE id = ? and child_id = ?");
        $stmt->execute([$recordId, $childId]);
    }

    function updateRss($xmlUrl){
        $xmlContent = '<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
<channel>
    <title>CHiM Feed RSS page</title>
    <link>localhost/CHiM/feed</link>
    <description>Childcare Manager</description>';
        $media = getFeedMedia();
        $finfo = finfo_open();
        foreach($media as $item){
            $fileUrl = getFileUrl($item['content'], getFileType($item['content']));
        $xmlContent .= '
    <item>
        <title>' . $item['id'] . '</title>
        <link>localhost/CHiM/feed</link>
        <description>'. $item['media_description'] .'</description>
        <enclosure url="' . $fileUrl . '" length="' . strlen($item['content']) . '" type="'. finfo_buffer($finfo, $item['content'], FILEINFO_MIME_TYPE) . '" />
    </item>';
            }
            $xmlContent .= '
</channel>
</rss>';

        file_put_contents($xmlUrl, $xmlContent);
        header('Content-Type: application/rss+xml; charset=utf-8');
    }

    function getFileUrl($file, $type){
        $tempFilePath = $_SERVER['DOCUMENT_ROOT'] . '/CHiM/views/users/temp_storage/' . uniqid('file_') . $type ;
        file_put_contents($tempFilePath, $file);
        return $tempFilePath;
    }

    function getFileType($file){
        $finfo = finfo_open();
        $mimeType = finfo_buffer($finfo, $file, FILEINFO_MIME_TYPE);
        finfo_close($finfo);
        if($mimeType == 'image/jpeg') return '.jpg';
        else if($mimeType == 'image/png') return '.png';
        else if($mimeType == 'image/gif') return '.gif';
        else if($mimeType == 'video/mp4') return '.mp4';
        else if($mimeType == 'video/mkv') return '.mkv';
        else return '.jpg';
    }
?>