<?php
    require_once dirname(__DIR__) . '/config.php';
require_once ROOT_PATH . "models/database.php";
    //ob_start(); ?
foreach ($userChildrenList as $child) { ?>
        <a onclick="setSessionChildId(<?php echo $_SESSION['user_id']; ?>, <?php echo $child['id'];?>)">
            <div class="pr-child-container">
                <img id="pr-child-img-container<?php echo $child['id'];?>" src="data:image/jpeg;base64,<?php echo $child['photo'] != null ? base64_encode($child['photo']) : base64_encode(file_get_contents('../CHiM/views/public_view/page-images/no-user-icon.png'));?>">
                <span><?php echo $child['fullname'];?></span>   
            </div>
        </a>
    <?php } ?>
    <button id="pr-p-container">+</button>
