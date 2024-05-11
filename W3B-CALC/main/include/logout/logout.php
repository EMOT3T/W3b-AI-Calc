<?php
session_start();

$_SESSION = array();
session_destroy();

header("Location: ../../../login/login/index.html");

exit;
?>