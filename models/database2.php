<?php
    //session_start();

    // TEMP (until login is done):
    $_SESSION['user_id'] = '8'; // instantiat from login / register
    if(empty($_SESSION['child_id'])) $_SESSION['child_id'] = '1'; // initially, must be the first child of the user_id
    //

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
        return base64_encode($childPic['photo']);
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
            $stmt = $GLOBALS['pdo']->prepare("INSERT INTO media(child_id, user_id, important, shared, media_type, content, media_description) values(?,?,?,?,?,?,?)");
            $stmt->execute([$childId, $userId, $important, $shared, $type, file_get_contents(base64_decode($photo)), $description]);
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

?>