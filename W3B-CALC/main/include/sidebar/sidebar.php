<?php

include "../sessionVerify/sessionVerify.php";

sessionVerify();

if(!isset($_SESSION['permissions'])) {
    header("Location: ../logout/logout.php");
    exit;

} else {
    $permission = $_SESSION['permissions'];
    $userId = $permission['user_id'];
    $userPermission = $permission['permission'];

    if($userId != $_SESSION['user_id']) {
        header("Location: ../logout/logout.php");
        exit;
    }
}

?>


<div class="sidebar">
        <h2>Minha Sidebar</h2>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Values</a></li>
            <?php if ($userId == 3): ?>
                <li><a href="#">Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>