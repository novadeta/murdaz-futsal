<?php 
$root = dirname(__DIR__);
include_once "$root/core/UserController.php";
$user = new UserController();
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['username']) && !isset($_SESSION['role'])) {
    $validate_user = $user->get_user($_SESSION['username']);
    if ($validate_user < 1) {
        return header('Location: index.php');
    }
    return header('Location: index.php');
}else{
    $session_user = $user->get_user(['username' => $_SESSION['username']]);
}
if ($_SESSION['role'] < 2) {
    return header('Location: index.php');
}

?>