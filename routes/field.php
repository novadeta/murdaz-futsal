<?php 
include_once "../core/FieldController.php";
session_start();
$field = new FieldController();
$request = $_POST;
$action = $_GET['action'];
switch ($action) {
    case 'create_field':
        $result = $field->create_field($request);
        echo json_encode(['status' => 'success', 'message' => 'Berhasil menambah lapangan']);
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