<?php
require_once '../CHiM/views/includes/header.php';
require_once '../CHiM/models/image_processing.php';
?>

<div class="feed-background">
    <div class="feed-background feed-top-delim"></div>
    <?php
    $feedMedia = getFeedMedia();
    foreach ($feedMedia as $post) :
        $authorInfo = getUserInfoPost($post['user_id']); ?>
        <div class="feed-content-container">
            <img class="feed-content-auth" src="..\CHiM\views\public_view\page-images\no-user-icon.png" alt="Profile picture"> <!-- data:image/jpeg;base64,<?php //base64_encode($authorInfo['profile_pic']); ?> -->
            <div class="feed-account-name">
                <?= htmlspecialchars($authorInfo['fname'] . " " . $authorInfo['lname']); ?>
                <span class="feed-pub-time">
                    <?php
                        $sharedTime = new DateTime($post['shared_at']);
                        $currentTime = (new DateTime())->modify('+1 hour'); // why? :\
                        $diff = $sharedTime->diff($currentTime);
                        $years = $diff->y;
                        $seconds = $diff->s;
                        $minutes = $diff->i;
                        $hours = $diff->h;
                        $days = $diff->d;
                        $months = $diff->m;
                        //echo $currentTime->format('Y-m-d H:i:s') . " |";
                        if($years > 0) echo substr($post['shared_at'], 0, 10);
                        else if($months > 0) echo $months > 1 ? ($months . ' months ago') : 'One month ago';
                        else if($days > 0) echo $days > 1 ? ($days .' days ago') : 'One day ago';
                        else if($hours > 0) echo $hours . ($hours > 1 ? ' hours, ' : ' hour, ') . ($minutes == 0 ? '' : ($minutes . ($minutes > 1 ? ' minutes ago' : ' minute ago')));
                        else if($minutes > 0) echo $minutes . ($minutes > 1 ? ' minutes ago' : ' minute ago');
                        else echo $seconds . ($seconds > 1 ? ' seconds ago' : ' second ago');
                    ?>
                </span>
            </div>

            <span class="feed-description">
                <?php
                    echo $post['media_description'];
                ?>
            </span>
            
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
    <!-- <div class="feed-background feed-bottom-delim"></div> -->
</div>

<script src='../CHiM/controllers/js/feed.js'></script>

<?php
require_once dirname(__DIR__,2) . '/views/includes/footer.php';
?>