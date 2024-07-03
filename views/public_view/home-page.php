<?php
require_once dirname(__DIR__, 2) . '/config.php';
require_once ROOT_PATH . 'views/includes/header.php';
?>

<div class="hp-background">
    <div id="hp-img-container">
        <img src="../CHIM/views/public_view/page-images/hp-header.png" alt="Home Page Header" />
        <div id="hp-img-text">CHiM</div>
        <?php if(!isset($_SESSION['user_id'])) { 
            echo '<a href="/CHiM/login" id="hp-join-button">Join Us!</a>';
        }?>
    </div>
    <div id="hp-text">
        <h1>Childcare Manager</h1>
        <p>In the contemporary era, where families are increasingly digitally connected,
            the need for efficient and user-friendly tools to manage childcare has become paramount.
            Introducing CHiM, an innovative web application designed to cater to the evolving
            needs of modern families and couples in nurturing and managing the growth and development
            of their children from infancy through puberty.
        </p>
        <p>
            CHiM provides a comprehensive platform for authenticated users,
            whether families or couples, to seamlessly manage various aspects of childcare.
            From tracking feeding and sleep schedules to documenting significant milestones and
            capturing precious moments through multimedia resources such as photos, videos, and
            audio recordings, CHiM streamlines the childcare process.
        </p>
        <p>
            Join us on this journey as we revolutionize childcare management with CHiM,
            your digital companion in parenting.
        </p>
    </div>
    <div class="free-space"></div>
    <div id="hp-delim">
        <img src="../CHiM/views/public_view/page-images/hp-header-delim.png" alt="hp-delim" />
    </div>
    <div class="free-space">
        <h2>Created by:</h2>
        <div id="hp-cr">
            <p>Chiriac Andrei</p>
            <p>Georgescu Răzvan</p>
            <img src="../CHiM/views/public_view/page-images/andrei.jpg" />
            <img src="../CHiM/views/public_view/page-images/razvan-new.jpg" />
        </div>
    </div>
</div>

<?php
require_once dirname(__DIR__,2) . '/views/includes/footer.php';
?>