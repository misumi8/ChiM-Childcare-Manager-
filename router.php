<?php
    require_once "..\CHiM\controllers\includes\database.php";
    //$params = split("/", $_SERVER['REQUEST_URI']);
    //$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    //echo $uri;
    // $uri = trim($_SERVER['REQUEST_URI'], '/'); // elim slashes start, end
    // $uri = substr($uri, strpos($uri, '/') + 1);
    $uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/'); // elim slashes start, end
    $uri = substr($uri, strpos($uri, '/') + 1);
    //echo $uri;
    //echo '<h1>' . $_SERVER['QUERY_STRING'] . '</h1>';
    if ($uri == 'home'){
        require_once('../CHiM/views/public_view/home-page.php');
    }
    else if ($uri == 'profile'){
        require_once('../CHiM/views/public_view/profile.php');
    }
    else if ($uri == 'feed'){
        require_once('../CHiM/views/public_view/feed.php');
    }
    else if ($uri == 'login'){
        require_once('../CHiM/views/public_view/login.php');
    }
    else if ($uri == 'register'){
        require_once('../CHiM/views/public_view/register.php');
    }
    else if ($uri == 'feed/rss'){
        updateRss("../CHiM/views/rss.xml");
        require_once('../CHiM/views/rss.xml');
    }
    else{
        require_once('../CHiM/views/public_view/notFound.php');
    }
?>