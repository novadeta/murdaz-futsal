<?php 
$root = dirname(__DIR__);
include_once "$root/services/database.php";
class TransactionController extends Database{
    var $file_path = "";
    public function __construct()
    {
        parent::__construct();
        $this->file_path = dirname(__DIR__);
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
    public function create_transaction($request,$file = ""){
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d h:i:s");
        if (file_exists($_FILES['payment']['tmp_name'])) {
            $status = "2";
            $directory = getcwd();
            $uploadDirectory = "/public/assets/photo_payments/";
            $filename = $_FILES['payment']['name'];
            $explode = explode(".",$filename);
            $extension = strtolower(end($explode));
            $fileTmp  = $_FILES['payment']['tmp_name'];
            $uploadPath = $directory . $uploadDirectory . basename($filename);
            move_uploaded_file($fileTmp,$uploadPath);
            $query = mysqli_query($this->connect, "insert into tbl_transactions(id_user,id_field,date,date_play,start_time,end_time,price,status) values('$request[id_user]','$request[id_field]','$request[date]','$request[date_play]','$request[start_time]','$request[end_time]','$status')");
        }
        var_dump($request);
        $status = "1";
        $query = mysqli_query($this->connect, "insert into tbl_transactions(id_user,id_field,date,date_play,start_time,end_time,price,status) values('$request[id_user]','$request[id_field]','$date','$request[date_play]','$request[start_time]','$request[end_time]','$request[price]','$status')");
        return ['message' => 'berhasil transaksi'];
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