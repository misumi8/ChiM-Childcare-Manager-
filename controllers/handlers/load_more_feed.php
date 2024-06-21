<?php
require_once '../includes/database.php';
require_once '../../helpers/image_processing.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$stmt = $GLOBALS['pdo']->prepare("SELECT * FROM media WHERE shared = true ORDER BY shared_at DESC LIMIT ? OFFSET ?");
$stmt->bindParam(1, $limit, PDO::PARAM_INT);
$stmt->bindParam(2, $offset, PDO::PARAM_INT);
$stmt->execute();
$feedMedia = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($feedMedia as $post) :
    $authorInfo = getUserInfoPost($post['user_id']); ?>
    <div class="feed-content-container">
        <img class="feed-content-auth" src="data:image/jpeg;base64,<?= base64_encode($authorInfo['profile_pic']); ?>" alt="Profile picture">
        <div class="feed-account-name"><?= htmlspecialchars($authorInfo['fname'] . " " . $authorInfo['lname']); ?></div>
        <hr>
        <?php 
        if ($post['media_type'] == "img") { 
            $imageData = resizeImage($post['content'], 560, 560); // Resize to 35rem (560px)
            if ($imageData !== false) {
                $base64Image = base64_encode($imageData); ?>
                <div class="feed-content-img">
                    <img src="data:image/jpeg;base64,<?= $base64Image; ?>" alt="Content">
                </div>
            <?php 
            }
        } elseif ($post['media_type'] == "video") { ?>
            <div class="feed-content-video">
                <video controls width="560"> <!-- Set width to 35rem (560px) -->
                    <source src="data:video/mp4;base64,<?= base64_encode($post['content']); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        <?php } elseif ($post['media_type'] == "audio") { ?>
            <div class="feed-content-audio">
                <audio controls>
                    <source src="data:audio/mpeg;base64,<?= base64_encode($post['content']); ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        <?php } ?>
    </div>
<?php endforeach; ?>
