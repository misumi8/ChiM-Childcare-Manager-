<?php
require_once dirname(__DIR__) . '/config.php';
require_once ROOT_PATH . 'models/database.php';
require_once ROOT_PATH . 'models/image_processing.php';
require_once ROOT_PATH . 'views/generatePost.php';

class FeedController {
    public function loadFeed($page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        return getFeedMedia($limit, $offset);
    }

    public function renderPost($post) {
        $authorInfo = getUserInfoPost($post['user_id']);
        $isAdmin = isset($_SESSION['userInfo']) && $_SESSION['userInfo']['isAdmin'] != 0;

        return renderPostView($post, $authorInfo, $isAdmin);
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