<?php
$root = dirname(__DIR__);
include_once "$root/services/database.php";
class FieldController extends Database{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_field($request){
        if ($request) {
            $query = mysqli_query($this->connect, "select * from tbl_fields where status = '$request'");
            while($row = mysqli_fetch_array($query)){
                $result[] = $row; 
            }
            return $result;
        }
        $query = mysqli_query($this->connect, "select * from tbl_fields");
        while($row = mysqli_fetch_array($query)){
            $result[] = $row; 
        }
        return $result;
    }
    public function create_field($request){
        $query = mysqli_query($this->connect, "insert into tbl_fields(field_code,field_name,status,qrcode) VALUE('$request[field_code]','$request[field_name]','$request[status]','$request[qrcode]')");
        return true;
    }
    public function show_field($request = ""){
        if (isset($request['qrcode'])) {
            $query = mysqli_query($this->connect, "select * from tbl_fields where qrcode = '$request[qrcode]'");
            return  $query->fetch_assoc();
        }
        $query = mysqli_query($this->connect, "select * from tbl_fields");
        while($row = mysqli_fetch_array($query)){
            $result[] = $row; 
        }
        return $result;
    }
    public function edit_field(){
        
    }
    public function delete_field($request){
        $query = mysqli_query($this->connect, "delete from tbl_fields where id_field = '$request[id_field]'");
        return true;
    }
    

}
?>