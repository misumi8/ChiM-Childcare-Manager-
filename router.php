<?php
require_once "./models/database.php";

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$uri = preg_replace('/^CHiM\//', '', $uri);

switch ($uri) {
    case 'home':
        require_once('../CHiM/views/public_view/home-page.php');
        break;
    case 'profile':
        require_once('../CHiM/views/public_view/profile.php');
        break;
    case 'feed':
        require_once('../CHiM/views/public_view/feed.php');
        break;
    case 'login':
        require_once('../CHiM/views/public_view/login.php');
        break;
    case 'register':
        require_once('../CHiM/views/public_view/register.php');
        break;
    case 'feed/rss':
        updateRss("../CHiM/views/rss.xml");
        require_once('../CHiM/views/rss.xml');
        break;
    default:
        if (str_contains($uri, 'api')) {
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    echo handleGetRequest($uri);
                    break;
                case 'POST':
                    echo handlePostRequest($uri);
                    break;
                case 'PUT':
                    echo handlePutRequest($uri);
                    break;
                case 'DELETE':
                    echo handleDeleteRequest($uri);
                    break;
                default:
                    http_response_code(405);
                    echo json_encode(['errorMessage' => 'Method Not Allowed'], JSON_PRETTY_PRINT);
                    break;
            }
        } else {
            require_once('../CHiM/views/public_view/notFound.php');
        }
        break;
}

function handleGetRequest($uri) {
    $matches = '';
    switch (true) {
        case preg_match('/users\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $userData = getUserInfoById($id);
            if ($userData == null) http_response_code(400);
            return $userData == null ? json_encode(["errorMessage" => "User with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT) : json_encode($userData, JSON_PRETTY_PRINT);
        case preg_match('/users\/(?<user_id>\d+)\/(?<child_id>\d+)$/', $uri, $matches):
            $childId = $matches['child_id'];
            $userId = $matches['user_id'];
            $childData = getChildInfoByParentId($childId, $userId);
            if (isset($childData['photo'])) unset($childData['photo']);
            if ($childData == null) {
                http_response_code(400);
                return json_encode(["errorMessage" => "Parent with id " . $userId . " doesn't have a child with id " . $childId], JSON_PRETTY_PRINT);
            } else return json_encode($childData, JSON_PRETTY_PRINT);
        case preg_match('/children\/(?<child_id>\d+)$/', $uri, $matches):
            $childId = $matches['child_id'];
            $childData = getChildInfo($childId);
            if (isset($childData['photo'])) unset($childData['photo']);
            if ($childData == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $childId . " doesn't exist."], JSON_PRETTY_PRINT);
            } else return json_encode($childData, JSON_PRETTY_PRINT);
        case preg_match('/media\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $mediaData = getMediaInfoById($id);
            if (isset($mediaData['content'])) unset($mediaData['content']);
            if ($mediaData == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Media post with id " . $id . " doesn't exist."], JSON_PRETTY_PRINT);
            } else return json_encode($mediaData, JSON_PRETTY_PRINT);
        case preg_match('/media\/child\/(?<child_id>\d+)$/', $uri, $matches):
            $id = $matches['child_id'];
            $mediaListData = getChildMemories($id);
            foreach ($mediaListData as &$media) {
                if (isset($media['content'])) unset($media['content']);
            }
            if ($mediaListData == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $id . " doesn't exist or doesn't have any memories yet."], JSON_PRETTY_PRINT);
            } else return json_encode($mediaListData, JSON_PRETTY_PRINT);
        case preg_match('/feeding-records\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $feedingRecords = getAllFeedingRecords($id);
            if ($feedingRecords == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $id . " doesn't have any feeding records yet."], JSON_PRETTY_PRINT);
            } else return json_encode($feedingRecords, JSON_PRETTY_PRINT);
        case preg_match('/feeding-records\/(?<weekday>(sunday|monday|tuesday|wednesday|thursday|friday|saturday))\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $weekday = $matches['weekday'];
            $feedingRecords = getFeedingRecords($id, $weekday);
            if ($feedingRecords == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $id . " doesn't have any feeding records on " . $weekday . " yet."], JSON_PRETTY_PRINT);
            } else return json_encode($feedingRecords, JSON_PRETTY_PRINT);
        case preg_match('/sleeping-records\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $feedingRecords = getAllSleepingRecords($id);
            if ($feedingRecords == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Media post with id " . $id . " doesn't exist."], JSON_PRETTY_PRINT);
            } else return json_encode($feedingRecords, JSON_PRETTY_PRINT);
        case preg_match('/sleeping-records\/(?<weekday>(sunday|monday|tuesday|wednesday|thursday|friday|saturday))\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $weekday = $matches['weekday'];
            $sleepingRecords = getSleepingRecords($id, $weekday);
            if ($sleepingRecords == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $id . " doesn't have any sleeping records on " . $weekday . " yet."], JSON_PRETTY_PRINT);
            } else return json_encode($sleepingRecords, JSON_PRETTY_PRINT);
        case preg_match('/medical-records\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $medicalRecords = getMedicalRecordsByChildId($id);
            if ($medicalRecords == null) {
                http_response_code(400);
                return json_encode(['errorMessage' => "Child with id " . $id . " doesn't have any medical records yet."], JSON_PRETTY_PRINT);
            } else return json_encode($medicalRecords, JSON_PRETTY_PRINT);
        default:
            http_response_code(400);
            return json_encode(['errorMessage' => "Unhandled request"], JSON_PRETTY_PRINT);
    }
}

function handlePostRequest($uri) {
    $matches = '';
    switch (true) {
        case preg_match('/users$/', $uri, $matches):
            $data = json_decode(file_get_contents('php://input'), true);
            if (!isset($data['email']) || !isset($data['user_password']) || !isset($data['fname']) || !isset($data['lname']) || !isset($data['birthday'])) {
                http_response_code(400);
                return json_encode(['errorMessage' => 'Unset params. The following parameters are required: email, user_password, fname, lname, birthday(yyyy.mm.dd)'], JSON_PRETTY_PRINT);
            }
            $answer = addNewUser($data['email'], $data['user_password'], $data['fname'], $data['lname'], $data['birthday']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        case preg_match('/children$/', $uri, $matches):
            $data = json_decode(file_get_contents('php://input'), true);
            if (!isset($data['user_id']) || !isset($data['fullname']) || !isset($data['birthday']) || !isset($data['gender'])) {
                http_response_code(400);
                return json_encode(['errorMessage' => 'Unset params. The following parameters are required: user_id, fullname, gender, birthday(yyyy.mm.dd)'], JSON_PRETTY_PRINT);
            }
            $answer = addNewChildren($data['user_id'], $data['fullname'], $data['birthday'], $data['height'], $data['gender'], $data['fav_food'], $data['fav_hobby']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        case preg_match('/feeding-records$/', $uri, $matches):
            $data = json_decode(file_get_contents('php://input'), true);
            if (!isset($data['child_id']) || !isset($data['rec_weekday']) || !isset($data['record_time']) || !isset($data['rec_description'])) {
                http_response_code(400);
                return json_encode(['errorMessage' => 'Unset params. The following parameters are required: child_id, rec_weekday, record_time, rec_description'], JSON_PRETTY_PRINT);
            }
            $answer = addNewFeedingRecordWithChildId($data['child_id'], $data['rec_weekday'], $data['record_time'], $data['rec_description']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        case preg_match('/sleeping-records$/', $uri, $matches):
            $data = json_decode(file_get_contents('php://input'), true);
            if (!isset($data['child_id']) || !isset($data['rec_weekday']) || !isset($data['start_time']) || !isset($data['end_time']) || !isset($data['rec_description'])) {
                http_response_code(400);
                return json_encode(['errorMessage' => 'Unset params. The following parameters are required: child_id, rec_weekday, start_time, end_time, rec_description'], JSON_PRETTY_PRINT);
            }
            $answer = addNewSleepingRecordWithChildId($data['child_id'], $data['rec_weekday'], $data['start_time'], $data['end_time'], $data['rec_description']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        case preg_match('/medical-records$/', $uri, $matches):
            $data = json_decode(file_get_contents('php://input'), true);
            if (!isset($data['child_id']) || !isset($data['user_id']) || !isset($data['doctor_name']) || !isset($data['diagnosis']) || !isset($data['treatment']) || !isset($data['record_date'])) {
                http_response_code(400);
                return json_encode(['errorMessage' => 'Unset params. The following parameters are required: child_id, user_id, doctor_name, diagnosis, treatment, record_date'], JSON_PRETTY_PRINT);
            }
            $answer = addNewMedicalRecordWithChildId($data['child_id'], $data['user_id'], $data['doctor_name'], $data['diagnosis'], $data['treatment'], $data['record_date']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        default:
            http_response_code(400);
            return json_encode(['errorMessage' => "Unhandled request"], JSON_PRETTY_PRINT);
    }
}

function handlePutRequest($uri) {
    $matches = '';
    switch (true) {
        case preg_match('/users$/', $uri, $matches):
            $data = json_decode(file_get_contents('php://input'), true);
            $answer = updateUser($data['id'], $data['email'], $data['user_password'], $data['fname'], $data['lname'], $data['birthday']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        case preg_match('/children$/', $uri, $matches):
            $data = json_decode(file_get_contents('php://input'), true);
            $answer = updateChild($data['id'], $data['user_id'], $data['fullname'], $data['birthday'], $data['height'], $data['gender'], $data['fav_food'], $data['fav_hobby']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        case preg_match('/feeding-records$/', $uri, $matches):
            $data = json_decode(file_get_contents('php://input'), true);
            $answer = updateFeedingRecord($data['id'], $data['child_id'], $data['rec_weekday'], $data['record_time'], $data['rec_description']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        case preg_match('/sleeping-records$/', $uri, $matches):
            $data = json_decode(file_get_contents('php://input'), true);
            $answer = updateSleepingRecord($data['id'], $data['child_id'], $data['rec_weekday'], $data['start_time'], $data['end_time'], $data['rec_description']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        case preg_match('/medical-records$/', $uri, $matches):
            $data = json_decode(file_get_contents('php://input'), true);
            $answer = updateMedicalRecord($data['id'], $data['child_id'], $data['user_id'], $data['doctor_name'], $data['diagnosis'], $data['treatment'], $data['record_date']);
            http_response_code($answer[0]);
            return json_encode(['message' => $answer[1]], JSON_PRETTY_PRINT);
        default:
            http_response_code(400);
            return json_encode(['errorMessage' => "Unhandled request"], JSON_PRETTY_PRINT);
    }
}

function handleDeleteRequest($uri) {
    $matches = '';
    switch (true) {
        case preg_match('/users\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $deleted = deleteUserById($id);
            if (!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "User with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            } else return json_encode(["message" => "Success. User with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        case preg_match('/children\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $deleted = deleteChildById($id);
            if (!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "Child with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            } else return json_encode(["message" => "Success. Child with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        case preg_match('/media\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $deleted = deleteMediaById($id);
            if (!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "Media post with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            } else return json_encode(["message" => "Success. Media post with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        case preg_match('/feeding-records\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $deleted = deleteFeedingRecordById($id);
            if (!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "Feeding record with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            } else return json_encode(["message" => "Success. Feeding record with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        case preg_match('/sleeping-records\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $deleted = deleteSleepingRecordById($id);
            if (!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "Sleeping record with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            } else return json_encode(["message" => "Success. Sleeping record with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        case preg_match('/medical-records\/(?<id>\d+)$/', $uri, $matches):
            $id = $matches['id'];
            $deleted = deleteMedicalRecordById($id);
            if (!$deleted) {
                http_response_code(400);
                return json_encode(["errorMessage" => "Medical record with id " . $id . " doesn't exist"], JSON_PRETTY_PRINT);
            } else return json_encode(["message" => "Success. Medical record with id " . $id . " was deleted"], JSON_PRETTY_PRINT);
        default:
            http_response_code(400);
            return json_encode(['errorMessage' => "Unhandled request"], JSON_PRETTY_PRINT);
    }
}
?>
