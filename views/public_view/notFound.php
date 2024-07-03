<?php
require_once dirname(__DIR__, 2) . '/config.php';

require_once ROOT_PATH . '/views/includes/header.php';
?>
<div id="nf-main-frame">
    <div id="nf-error-message">
        <span>404</span>
        <span>Page Not Found</span>
    </div>
    <img src='../CHiM/views/public_view/page-images/notFound.png'></img>
</div>
<?php
require_once ROOT_PATH . '/views/includes/footer.php';
?>