<?php
    require_once "..\CHiM\controllers\includes\database.php";
    //$params = split("/", $_SERVER['REQUEST_URI']);
    //$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    //echo $uri;
    // $uri = trim($_SERVER['REQUEST_URI'], '/'); // elim slashes start, end
    // $uri = substr($uri, strpos($uri, '/') + 1);
    $uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/'); // elim slashes start, end
    $uri = substr($uri, strpos($uri, '/') + 1);
    //echo $uri;
    //echo '<h1>' . $_SERVER['QUERY_STRING'] . '</h1>';
    if ($uri == 'home'){
        require_once('../CHiM/views/public_view/home-page.php');
    }
    else if ($uri == 'profile'){
        require_once('../CHiM/views/public_view/profile.php');
    }
    else if ($uri == 'feed'){
        require_once('../CHiM/views/public_view/feed.php');
    }
    else if ($uri == 'login'){
        require_once('../CHiM/views/public_view/login.php');
    }
    else if ($uri == 'register'){
        require_once('../CHiM/views/public_view/register.php');
    }
    else if ($uri == 'feed/rss'){
        updateRss("../CHiM/views/rss.xml");
        require_once('../CHiM/views/rss.xml');
    }
    else {
        if(str_contains($uri, 'api')){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                echo handleGetRequest($uri);
            }
            else if($_SERVER['REQUEST_METHOD'] == 'POST'){
                echo handlePostRequest($uri);
            }
            else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
                echo handlePutRequest($uri);
            }
            else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
                echo handleDeleteRequest($uri);
            }
        }
        else{
            require_once('../CHiM/views/public_view/notFound.php');
        }
    }

    function handleGetRequest($uri){
        $matches = '';
        if(preg_match('/users\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $userData = getUserInfoById($id);
            if($userData == null) http_response_code(400);
            return $userData == null ? json_encode(["errorMessage" => "User with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT) : json_encode($userData, JSON_PRETTY_PRINT);
        }
        else if(preg_match('/users\/(?<user_id>\d+)\/(?<child_id>\d+)$/', $uri, $matches)){
            //need data about child photo? 
            $childId = $matches['child_id'];
            $userId = $matches['user_id'];
            $childData = getChildInfoByParentId($childId, $userId);
            if (isset($childData['photo'])) unset($childData['photo']);
            if($childData == null){
                http_response_code(400);
                return json_encode(["errorMessage" => "Parent with id " . $userId . " doesn't have a child with id " . $childId], JSON_PRETTY_PRINT);
            }
            else return json_encode($childData, JSON_PRETTY_PRINT);
        }
        else if(preg_match('/children\/(?<child_id>\d+)$/', $uri, $matches)){
            //need data about child photo? 
            $childId = $matches['child_id'];
            $childData = getChildInfo($childId);
            if (isset($childData['photo'])) unset($childData['photo']);
            if($childData == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $childId . " doesn't exist."], JSON_PRETTY_PRINT);
            }
            else return json_encode($childData, JSON_PRETTY_PRINT);
        }
        else if(preg_match('/media\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $mediaData = getMediaInfoById($id);
            if (isset($mediaData['content'])) unset($mediaData['content']);
            if($mediaData == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Media post with id " . $id . " doesn't exist."], JSON_PRETTY_PRINT);
            }
            else return json_encode($mediaData, JSON_PRETTY_PRINT);
        }
        else if(preg_match('/media\/child\/(?<child_id>\d+)$/', $uri, $matches)){
            $id = $matches['child_id'];
            $mediaListData = getChildMemories($id);
            foreach($mediaListData as &$media) { //& for not copy-on-write access
                if (isset($media['content'])) unset($media['content']);
            }
            if($mediaListData == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $id . " doesn't exist or doesn't have any memories yet."], JSON_PRETTY_PRINT);
            }
            else return json_encode($mediaListData, JSON_PRETTY_PRINT);
        }
        else if(preg_match('/feeding-records\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $feedingRecords = getAllFeedingRecords($id);
            if($feedingRecords == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $id . " doesn't have any feeding records yet."], JSON_PRETTY_PRINT);
            }
            else return json_encode($feedingRecords, JSON_PRETTY_PRINT);
        }
        else if(preg_match('/feeding-records\/(?<weekday>(sunday|monday|tuesday|wednesday|thursday|friday|saturday))\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $weekday = $matches['weekday'];
            $feedingRecords = getFeedingRecords($id, $weekday);
            if($feedingRecords == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $id . " doesn't have any feeding records on " . $weekday . " yet."], JSON_PRETTY_PRINT);
            }
            else return json_encode($feedingRecords, JSON_PRETTY_PRINT);
        }
        else if(preg_match('/sleeping-records\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $feedingRecords = getAllSleepingRecords($id);
            if($feedingRecords == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Media post with id " . $id . " doesn't exist."], JSON_PRETTY_PRINT);
            }
            else return json_encode($feedingRecords, JSON_PRETTY_PRINT);
        }
        else if(preg_match('/sleeping-records\/(?<weekday>(sunday|monday|tuesday|wednesday|thursday|friday|saturday))\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $weekday = $matches['weekday'];
            $sleepingRecords = getSleepingRecords($id, $weekday);
            if($sleepingRecords == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $id . " doesn't have any sleeping records on " . $weekday . " yet."], JSON_PRETTY_PRINT);
            }
            else return json_encode($sleepingRecords, JSON_PRETTY_PRINT);
        }
        else if(preg_match('/medical-records\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $medicalRecords = getMedicalRecordsByChildId($id);
            if($medicalRecords == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $id . " doesn't have any medical records yet."], JSON_PRETTY_PRINT);
            }
            else return json_encode($medicalRecords, JSON_PRETTY_PRINT);
        }
        else {
            http_response_code(400);
            return json_encode(['errorMessage' => "Unhandled request"], JSON_PRETTY_PRINT);
        }
    }

    function handlePostRequest($uri){
        $matches = '';
        if(preg_match('/users$/', $uri, $matches)){
            $data = json_decode(file_get_contents('php://input'), true); // ,true -> $data.type = array
            if(!isset($data['email']) || !isset($data['user_password']) || !isset($data['fname']) || !isset($data['lname']) || !isset($data['birthday'])) {
                http_response_code(400);
                return json_encode(['errorMessage' => 'Unset params. The following parameters are required: email, user_password, fname, lname, birthday(yyyy.mm.dd)'], JSON_PRETTY_PRINT);
            }
            $answer = addNewUser($data['email'], $data['user_password'], $data['fname'], $data['lname'], $data['birthday']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        }
        else if(preg_match('/children$/', $uri, $matches)){
            $data = json_decode(file_get_contents('php://input'), true);
            if(!isset($data['user_id']) || !isset($data['fullname']) || !isset($data['birthday']) || !isset($data['gender'])) {
                http_response_code(400);
                return json_encode(['errorMessage' => 'Unset params. The following parameters are required: user_id, fullname, gender, birthday(yyyy.mm.dd)'], JSON_PRETTY_PRINT);
            }
            $answer = addNewChildren($data['user_id'], $data['fullname'], $data['birthday'], $data['height'], $data['gender'], $data['fav_food'], $data['fav_hobby']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        }
        else if(preg_match('/feeding-records$/', $uri, $matches)){
            $data = json_decode(file_get_contents('php://input'), true);
            if(!isset($data['child_id']) || !isset($data['rec_weekday']) || !isset($data['record_time']) || !isset($data['rec_description'])) {
                http_response_code(400);
                return json_encode(['errorMessage' => 'Unset params. The following parameters are required: child_id, rec_weekday, record_time, rec_description'], JSON_PRETTY_PRINT);
            }
            $answer = addNewFeedingRecordWithChildId($data['child_id'], $data['rec_weekday'], $data['record_time'], $data['rec_description']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        }
        else if(preg_match('/sleeping-records$/', $uri, $matches)){
            $data = json_decode(file_get_contents('php://input'), true);
            if(!isset($data['child_id']) || !isset($data['rec_weekday']) || !isset($data['start_time']) || !isset($data['end_time']) || !isset($data['rec_description'])) {
                http_response_code(400);
                return json_encode(['errorMessage' => 'Unset params. The following parameters are required: child_id, rec_weekday, start_time, end_time, rec_description'], JSON_PRETTY_PRINT);
            }
            $answer = addNewSleepingRecordWithChildId($data['child_id'], $data['rec_weekday'], $data['start_time'], $data['end_time'], $data['rec_description']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        }
        else if(preg_match('/medical-records$/', $uri, $matches)){
            $data = json_decode(file_get_contents('php://input'), true);
            if(!isset($data['child_id']) || !isset($data['user_id']) || !isset($data['doctor_name']) || !isset($data['diagnosis']) || !isset($data['treatment']) || !isset($data['record_date'])) {
                http_response_code(400);
                return json_encode(['errorMessage' => 'Unset params. The following parameters are required: child_id, user_id, doctor_name, diagnosis, treatment, record_date'], JSON_PRETTY_PRINT);
            }
            $answer = addNewMedicalRecordWithChildId($data['child_id'], $data['user_id'], $data['doctor_name'], $data['diagnosis'], $data['treatment'], $data['record_date']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        }
        else {
            http_response_code(400);
            return json_encode(['errorMessage' => "Unhandled request"], JSON_PRETTY_PRINT);
        }
    }

    function handlePutRequest($uri){
        if(preg_match('/users$/', $uri, $matches)){
            //$id = $matches['id'];
            $data = json_decode(file_get_contents('php://input'), true);
            $answer = updateUser($data['id'], $data['email'], $data['user_password'], $data['fname'], $data['lname'], $data['birthday']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        }
        if(preg_match('/children$/', $uri, $matches)){
            $data = json_decode(file_get_contents('php://input'), true);
            $answer = updateChild($data['id'], $data['user_id'], $data['fullname'], $data['birthday'], $data['height'], $data['gender'], $data['fav_food'], $data['fav_hobby']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        }
        if(preg_match('/feeding-records$/', $uri, $matches)){
            $data = json_decode(file_get_contents('php://input'), true);
            //child_id, rec_weekday, record_time, rec_description
            $answer = updateFeedingRecord($data['id'], $data['child_id'], $data['rec_weekday'], $data['record_time'], $data['rec_description']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        }
        if(preg_match('/sleeping-records$/', $uri, $matches)){
            $data = json_decode(file_get_contents('php://input'), true);
            $answer = updateSleepingRecord($data['id'], $data['child_id'], $data['rec_weekday'], $data['start_time'], $data['end_time'], $data['rec_description']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        }
        if(preg_match('/medical-records$/', $uri, $matches)){
            $data = json_decode(file_get_contents('php://input'), true);
            $answer = updateMedicalRecord($data['id'], $data['child_id'], $data['user_id'], $data['doctor_name'], $data['diagnosis'], $data['treatment'], $data['record_date']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        }
        else {
            http_response_code(400);
            return json_encode(['errorMessage' => "Unhandled request"], JSON_PRETTY_PRINT);
        }
    }

    function handleDeleteRequest($uri){
        $matches = '';
        if(preg_match('/users\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $deleted = deleteUserById($id);
            if(!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "User with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            }
            else return json_encode(["message" => "Success. User with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        }
        else if(preg_match('/children\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $deleted = deleteChildById($id);
            if(!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "Child with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            }
            else return json_encode(["message" => "Success. Child with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        }
        else if(preg_match('/media\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $deleted = deleteMediaById($id);
            if(!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "Media post with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            }
            else return json_encode(["message" => "Success. Media post with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        }
        else if(preg_match('/feeding-records\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $deleted = deleteFeedingRecordById($id);
            if(!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "Feeding record with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            }
            else return json_encode(["message" => "Success. Feeding record with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        }
        else if(preg_match('/sleeping-records\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $deleted = deleteSleepingRecordById($id);
            if(!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "Sleeping record with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            }
            else return json_encode(["message" => "Success. Sleeping record with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        }
        else if(preg_match('/medical-records\/(?<id>\d+)$/', $uri, $matches)){
            $id = $matches['id'];
            $deleted = deleteMedicalRecordById($id);
            if(!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "Medical record with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            }
            else return json_encode(["message" => "Success. Medical record with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        }
        else {
            http_response_code(400);
            return json_encode(['errorMessage' => "Unhandled request"], JSON_PRETTY_PRINT);
        }
    }
?>