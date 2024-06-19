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
        return "DONE;";
    }

    function getChildMemories($child_id){
        $stmt = $GLOBALS['pdo']->prepare("SELECT content, description FROM media WHERE child_id = ?");
        $stmt->execute([$child_id]);
        $childMemories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $childMemories;
    }

?>