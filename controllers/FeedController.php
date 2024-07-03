<?php
require_once dirname(__DIR__) . '/config.php';
require_once ROOT_PATH . 'models/database.php';
require_once ROOT_PATH . 'models/image_processing.php';

class FeedController {
    public function loadFeed($page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        return getFeedMedia($limit, $offset);
    }

    public function renderPost($post) {
        $authorInfo = getUserInfoPost($post['user_id']);
        ob_start();
        ?>
        <div class="feed-content-container">
            <img class="feed-content-auth" src="data:image/jpeg;base64,<?= base64_encode($authorInfo['profile_pic']); ?>" alt="Profile picture">
            <div class="feed-account-name"><?= htmlspecialchars($authorInfo['fname'] . " " . $authorInfo['lname']); ?></div>
            <?php if (isset($_SESSION['userInfo']) && $_SESSION['userInfo']['isAdmin'] != 0) {
              echo  '<button class="delete-post" data-post-id="' . $post['id'] . '">Delete</button>';
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
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var deleteButtons = document.querySelectorAll(".delete-post");

        deleteButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                var postId = this.getAttribute("data-post-id");
                
                if (confirm("Are you sure you want to delete this post?")) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "../CHiM/controllers/deletePost.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.status === 'success') {
                                    alert("Post deleted successfully!");
                                    location.reload();
                                } else {
                                    alert("Error deleting post: " + response.message);
                                }
                            } else {
                                alert("Error with the request. Status: " + xhr.status);
                            }
                        }
                    };
                    xhr.send("post_id=" + postId);
                }
            });
        });
    });
</script>
