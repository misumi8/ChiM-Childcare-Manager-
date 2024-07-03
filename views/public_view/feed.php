<?php
require_once dirname(__DIR__, 2) . '/config.php';
require_once ROOT_PATH .  'views/includes/header.php';
require_once ROOT_PATH .  'controllers/FeedController.php';

$controller = new FeedController();
$feedMedia = $controller->loadFeed();
?>

<div class="feed-background">
    <div class="feed-background feed-top-delim"></div>
    <?php
    foreach ($feedMedia as $post) {
        echo $controller->renderPost($post);
    }
    ?>
</div>

<script src="controllers/js/feed.js"></script>

<?php
require_once ROOT_PATH .  'views/includes/footer.php';
?>
