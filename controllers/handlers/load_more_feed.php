<?php
require_once dirname(__DIR__, 2) . '/config.php';
require_once ROOT_PATH . 'controllers/FeedController.php';

$controller = new FeedController();
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$feedMedia = $controller->loadFeed($page);

foreach ($feedMedia as $post) {
    echo $controller->renderPost($post);
}
?>