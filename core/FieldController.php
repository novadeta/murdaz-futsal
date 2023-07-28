<?php
$root = dirname(__DIR__);
include_once "$root/services/database.php";
class FieldController extends Database{
    public function __construct()
    {
        parent::__construct();
    }
    public function create_field($request){
        $query = mysqli_query($this->connect, "insert into tbl_fields(field_code,field_name,status) VALUE('$request[field_code]','$request[field_name]','$request[status]')");
        return true;
    }
    public function show_field(){
        $query = mysqli_query($this->connect, "select * from tbl_fields");
        while($row = mysqli_fetch_array($query)){
            $result[] = $row; 
        }
        return $result;
    }
    public function edit_field(){
        
    }
    public function delete_field(){

    }
    

}
?>