<?php
require_once '../includes/header.php';

$feedMedia = getFeedMedia()
/** - de adaugat sortare random a postarilor shared sau de stabilit o forma de sortare 
 *  - de adaugat mecanism social media website - style unde se incarca doar o bucata
 *  din tot content-ul in foreach si abia cand user-ul da scroll down se mai incarca alta bucata 
 *  - de inlocuit css feed-content-media cu feed-content-video, feed-content-audio si feed-content-img
 *  - de adaugat data la care s-a facut media row-ul shared = true si adaugat la postare(?)
 * */
?>

<div class="feed-background">
    <?php foreach ($feedMedia as $post) :
        $authorInfo = getUserInfoPost($post['user_id']); ?>
        <div class="feed-content-container">
            <img class="feed-content-auth" src=<?= $authorInfo['profile_pic']; ?> alt="Profile picture">
            <div class="feed-account-name"><?= $authorInfo['fname'] . " " . $authorInfo['lname']; ?></div>
            <hr>
            <?php if ($post['media_type'] == "img") { ?>
                <div class="feed-content-img"><img src=<?= $post['content']; ?> alt="Content"></div>
            <?php } elseif ($post['media_type'] == "video") { ?>
                <!-- <div class="feed-content-video"><img src="../users/user1/child1/child1_1.jpg" alt="Content"></div> -->
            <?php } elseif ($post['media_type'] == "audio") { ?>
                <!-- <div class="feed-content-audio"><img src="../users/user1/child1/child1_1.jpg" alt="Content"></div> -->
            <?php } ?>
        </div>
    <?php endforeach; ?>
    <div class="feed-content-container">
        <img class="feed-content-auth" src="../users/user1/user1_profile.jpg" alt="Profile picture">
        <div class="feed-account-name">Jhokn Doe</div>
        <hr>
        <div class="feed-content-media"><img src="../users/user1/child1/child1_1.jpg" alt="Content"></div>
    </div>

    <div class="feed-content-container">
        <img class="feed-content-auth" src="../users/user1/user1_profile.jpg" alt="Profile picture">
        <div class="feed-account-name">Jhon Doe</div>
        <hr>
        <div class="feed-content-media"><img src="../stock2.jpg" alt="Content"></div>
    </div>

    <div class="feed-content-container">
        <img class="feed-content-auth" src="../users/user1/user1_profile.jpg" alt="Profile picture">
        <div class="feed-account-name">Jhon Doe</div>
        <hr>
        <div class="feed-content-media"><img src="../users/user1/child1/child1_1.jpg" alt="Content"></div>
    </div>

</div>
<?php
require_once '../includes/footer.php';
?>