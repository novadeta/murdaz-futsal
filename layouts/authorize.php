<?php 
$root = dirname(__DIR__);
include_once "$root/core/UserController.php";
$user = new UserController();
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['username']) && !isset($_SESSION['role'])) {
    // return header('Location: index.php');
}
else{
    $validate_user = $user->get_user(['username' => $_SESSION['username']]);
    // if ($validate_user < 1) {
    //     return header('Location: index.php');
    // }
    if ($validate_user['data']['role'] == '1') {
        // return header('Location: index.php');
    }
    return $session_user = $user->get_user(['username' => $_SESSION['username']]);
}


?>