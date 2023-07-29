<?php
$root = dirname(__DIR__);
include_once "$root/services/database.php";
class TimeController extends Database{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_field($request){
        if ($request['id_user']) {
            $query = mysqli_query($this->connect, "select * from tbl_times where id_user = '$request'");
            while($row = mysqli_fetch_array($query)){
                $result[] = $row; 
            }
            return $result;
        }
    }
    public function create_time($request,$file = ""){
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d h:i:s");
        if (file_exists($_FILES['payment']['tmp_name'])) {
            $status = "1";
            $directory = getcwd();
            $uploadDirectory = "/public/assets/photo_payments/";
            $filename = $_FILES['payment']['name'];
            $explode = explode(".",$filename);
            $extension = strtolower(end($explode));
            $fileTmp  = $_FILES['payment']['tmp_name'];
            $uploadPath = $directory . $uploadDirectory . basename($filename);
            move_uploaded_file($fileTmp,$uploadPath);
            $query = mysqli_query($this->connect, "insert into tbl_times(id_user,date,time) VALUE('$request[id_user]','$request[date]','$request[time]')");
        }
        $status = "0";
        $query = mysqli_query($this->connect, "insert into tbl_times(id_user,date,time) VALUE('$request[id_user]','$request[date]','$request[time]')");
        return ['message' => 'berhasil transaksi'];
    }
    public function show_time($id_user){   
        $query = mysqli_query($this->connect, "select * from tbl_times where id_user = '$id_user'");
        // while($row = mysqli_fetch_array($query)){
        //     $result[] = $row; 
        // }
        return $query->fetch_assoc() ?? [] ;
    }
    public function edit_field($request){
        $query = mysqli_query($this->connect, "update tbl_time set id_user = '$request[id_user]', date = '$request[date]', time =  '$request[time]')");
        return true;
    }
    public function delete_field(){

    }
    

}
?>