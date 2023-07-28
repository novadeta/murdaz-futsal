<?php 
include_once "../core/TransactionController.php";
$field = new TransactionController();
$request = $_POST;
$action = $_GET['action'];
switch ($action) {
    case 'get_transaction':
        $result = $field->get_transaction($request);
        // echo $result;
        echo json_encode($result);
        break;
    case 'create_field':
        $result = $field->create_transaction($request);
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