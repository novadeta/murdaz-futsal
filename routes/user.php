<?php 
include_once "../core/UserController.php";
session_start();
$user = new UserController();
$request = $_POST;
$action = $_GET['action'];
switch ($action) {
    case 'get_user':
        $result = $user->get_user($request);
        echo $result;
        // echo json_encode($result);
        break;
        case 'createuser':
            $result = $user->create_user($request);
            echo json_encode($result);
            break;
        case 'checkuser':
            $result = $user->checkuser($request);
            echo json_encode($result);
            break;
        default:
        header('HTTP/1.1 404 URL Not Found');
        $json = array(
            "code" => "404", 
            "status" => 'error'
        );
        echo json_encode($json);
        break;
}

?>