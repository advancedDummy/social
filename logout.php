<?php
require_once "includes/Auth.php";

$auth = new Auth();

if (!$auth->isAuthenticated()) {
    header("Location: login.php");
    exit;
}

$auth->logout();
header("Location: login.php");
exit;