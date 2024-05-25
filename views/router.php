<?php
    //$params = split("/", $_SERVER['REQUEST_URI']);
    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    //echo $uri;
    switch ($uri[1]) {
        case "profile":
            include '../public_view/profile.php';
            break;
    }
?>