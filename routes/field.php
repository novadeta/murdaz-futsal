<?php 
include_once "../core/FieldController.php";
session_start();
$field = new FieldController();
$request = $_POST;
$action = $_GET['action'];
switch ($action) {
    case 'checkuser':
        // $result = $field->checkuser($request);
        echo json_encode($result);
        break;
    case 'create_field':
        $result = $field->create_field($request);
        echo "
        <script>
            alert('Berhasil Menambah')
            document.location.href = '../index.php?page=guest/lapangan'
        </script>
        ";
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