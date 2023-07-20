<?php 
include_once "../controller/UserController.php";
session_start();
$user = new UserController();
$request = $_POST;
$action = $_GET['action'];
switch ($action) {
    case 'checkuser':
        // $user->checkUser($request);
        $_SESSION['username'] = "asds";
        $json =  array(
            'username' => 'ade',
            'message' => 'success'
        );
        echo json_encode($json);
        break;
    
    default:
        echo"data yang anda cari tidak ada";
        break;
}

?>