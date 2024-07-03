<?php
function renderPostView($post, $authorInfo, $isAdmin) {
    ob_start();
    ?>
    <div class="feed-content-container">
        <img class="feed-content-auth" src="data:image/jpeg;base64,<?= base64_encode($authorInfo['profile_pic']); ?>" alt="Profile picture">
        <div class="feed-account-name"><?= htmlspecialchars($authorInfo['fname'] . " " . $authorInfo['lname']); ?></div>
        <?php if ($isAdmin) {
            echo '<button class="delete-post" data-post-id="' . $post['id'] . '">Delete</button>';
        } ?>
        <hr>
        <?php 
        if ($post['media_type'] == "img") { 
            $imageData = resizeImage($post['content'], 560, 560);
            if ($imageData !== false) {
                $base64Image = base64_encode($imageData); ?>
                <div class="feed-content-img">
                    <img src="data:image/jpeg;base64,<?= $base64Image; ?>" alt="Content">
                </div>
            <?php 
            }
        } elseif ($post['media_type'] == "video") { ?>
            <div class="feed-content-video">
                <video controls width="560">
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
    <?php
    return ob_get_clean();
}
?>
