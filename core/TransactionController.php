<?php 
$root = dirname(__DIR__);
include_once "$root/services/database.php";
class TransactionController extends Database{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_transaction($request = ""){
        if (isset($request['date_play'])) {
            $query = mysqli_query($this->connect, "select * from tbl_transactions where date_play = '$request[date_play]' and id_field = '$request[id_field]'");
            if ($query->num_rows < 1) {
                return ["data" => "Tidak ada data"];
            }
            while($row = mysqli_fetch_array($query)){
                $result[] = $row; 
            }
            return $result;
        }
        
        $query = mysqli_query($this->connect, "select * from tbl_transactions ");
        while($row = mysqli_fetch_array($query)){
            $result[] = $row; 
        }
        return $result;
    }
    public function create_transaction($request){
        
        $query = mysqli_query($this->connect, "insert into tbl_transactions values('$request[id_user]','$request[id_field]','$request[date]','$request[start_time]','$request[end_time]','$request[status]')");
    }
    public function show_transaction($request){
        $query = mysqli_query($this->connect, "delete from tbl_users where id_user = '$request' ");
    }
    public function edit_transaction($request){
        $query = mysqli_query($this->connect, "delete from tbl_users where id_user = '$request' ");
    }
    public function delete_transaction($request){  
        $query = mysqli_query($this->connect, "delete from tbl_users where id_user = '$request' ");
    }
    

}
?>