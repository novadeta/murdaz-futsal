<?php
$root = dirname(__DIR__);
include_once "$root/services/database.php";
class TimeController extends Database{
    public function __construct()
    {
        parent::__construct();
    }

    
    public function get_time($request){
        if (isset($request['status'])) {
            if ($request['status'] == 'validation') {
                $query = mysqli_query($this->connect, "select * from tbl_times inner join tbl_users on tbl_times.id_user = tbl_users.id_user where tbl_times.status_payment = '2'");
                while($row = mysqli_fetch_array($query)){
                    $result[] = $row; 
                }
                return $result ?? [];
            }
            if ($request['status'] == 'validation_user') {
                $query = mysqli_query($this->connect, "select * from tbl_times inner join tbl_users on tbl_times.id_user = tbl_users.id_user where tbl_times.status_payment = '2' and tbl_times.id_user = '$request[id_user]'");
                while($row = mysqli_fetch_array($query)){
                    $result[] = $row; 
                }
                return $result ?? [];
            }
            if ($request['status'] == 'waiting_payment') {
                $query = mysqli_query($this->connect, "select * from tbl_times inner join tbl_users on tbl_times.id_user = tbl_users.id_user where tbl_times.status_payment = '1' and tbl_times.id_user = '$request[id_user]'");
                while($row = mysqli_fetch_array($query)){
                    $result[] = $row; 
                }
                return $result ?? [];
            }
        }  
        if (isset($request['id_user'])) {
            $query = mysqli_query($this->connect, "select * from tbl_times where id_user = '$request[id_user]'");
            while($row = mysqli_fetch_array($query)){
                $result[] = $row; 
            }
            return $result ?? [];
        }
    }


    public function create_time($request,$file = ""){
        $validate_purchased = mysqli_query($this->connect, "select * from tbl_times where id_user = '$request[id_user]' and type_price = '$request[type_price]' and purchased_time > '00:00:00'");
        if ($validate_purchased->num_rows >= 1) {
            return ['error' => 'Hanya bisa memesan satu kali, silahkan tunggu hingga di terima'];
            // if time exists request example 18:00:00
            if (isset($validate_purchased->fetch_all()['purchased_time']) &&  $validate_purchased->fetch_all()['purchased_time'] !== "00:00:00") {
                return ['error' => 'Hanya bisa memesan satu kali di waktu yang sama, silahkan tunggu hingga di terima'];
            }
        }
        $isUser = mysqli_query($this->connect, "select * from tbl_times where id_user = '$request[id_user]' and type_price = '$request[type_price]'");
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d h:i:s");
        if ($isUser->num_rows < 1) {
            if (file_exists($file['payment']['tmp_name'])) {
                $status_payment = "2";
                $directory = getcwd();
                $uploadDirectory = "/public/assets/photo_payments/";
                $filename = $file['payment']['name'];
                $explode = explode(".",$filename);
                $extension = strtolower(end($explode));
                $fileTmp  = $file['payment']['tmp_name'];
                $uploadPath = $directory . $uploadDirectory . basename($filename);
                move_uploaded_file($fileTmp,$uploadPath);
                $query = mysqli_query($this->connect, "insert into tbl_times(id_user,date,time,purchased_time,price,type_price,payment,status_payment) VALUE('$request[id_user]','$date',time = '00:00:00','$request[purchased_time]','$request[price]','$request[type_price]','$filename','$status_payment')");
                return ['message' => 'berhasil transaksi'];
            }
            $status_payment = "1";
            $query = mysqli_query($this->connect, "insert into tbl_times(id_user,date,time,purchased_time,price,type_price,status_payment) VALUE('$request[id_user]','$date',time = '00:00:00','$request[purchased_time]','$request[price]','$request[type_price]','$status_payment')");
            return ['message' => 'berhasil transaksi'];
        }
        $id_time = $isUser->fetch_assoc();
            // If Time exists
        if (file_exists($file['payment']['tmp_name'])) {
            $status_payment = "2";
            $directory = getcwd();
            $uploadDirectory = "/public/assets/photo_payments/";
            $filename = $file['payment']['name'];
            $explode = explode(".",$filename);
            $extension = strtolower(end($explode));
            $fileTmp  = $file['payment']['tmp_name'];
            $uploadPath = $directory . $uploadDirectory . basename($filename);
            move_uploaded_file($fileTmp,$uploadPath);
            $query = mysqli_query($this->connect, "update tbl_times set date = '$date',time = '00:00:00', purchased_time = '$request[purchased_time]', payment = '$filename', status_payment = '$status_payment' where id_time = '$id_time')");
            return ['message' => 'berhasil membeli waktu'];
        }
        // if not payment
        $status_payment = "1";
        $query = mysqli_query($this->connect, "update tbl_times set date = '$date', purchased_time = '$request[purchased_time]',price = '$request[price]', status_payment = '$status_payment' where id_time = '$id_time[id_time]'");
        return ['error' => 'Pemesanan Waktu Berhasil'];
    }
        
    public function show_time($request){
        if (isset($request['status'])) {
            $query = mysqli_query($this->connect, "select * from tbl_transactions where id_user = '$request[id_user]' and status = '$request[status]' and id_field = '$request[id_field]'");
            while($row = mysqli_fetch_array($query)){
                $result[] = $row; 
            }
            return $result;
        }else if(isset($request['id_time'])){
            $query = mysqli_query($this->connect, "select * from tbl_times join tbl_users on tbl_times.id_user = tbl_users.id_user where id_time  = '$request[id_time]'");
            if ($query->num_rows < 1) {
                return [];
            }
            return $query->fetch_assoc();
        }
        $query = mysqli_query($this->connect, "select * from tbl_times where id_user = '$request[id_user]'");
        $result = $query->fetch_assoc();
        return $result;
    }
    
    public function edit_time($request , $file =''){
        if (file_exists($file['payment']['tmp_name'])) {
            $status = "2";
            $directory = getcwd();
            $uploadDirectory = "/public/assets/photo_payments/";
            $filename = $file['payment']['name'];
            $explode = explode(".",$filename);
            $extension = strtolower(end($explode));
            $fileTmp  = $file['payment']['tmp_name'];
            $uploadPath = $directory . $uploadDirectory . basename($filename);
            move_uploaded_file($fileTmp,$uploadPath);
            $query = mysqli_query($this->connect, "update tbl_times set status_payment = '2' where id_time = '$request[id_time]'");
            return ['message' => 'berhasil'];
        }
        if (isset($request['role']) && $request['role'] == '1') {
            $sql = mysqli_query($this->connect, "select * from tbl_times where id_time = '$request[id_time]'");
            $timeUser = $sql->fetch_assoc();
            $startTime = explode(":", $timeUser['time']);
            $endTime = explode(":", $request['purchased_time']);
            $currentTime = intval($startTime[0]) + intval($endTime[0]);
            $resultTime = sprintf('%02d:%02d:%02d', $currentTime, $startTime[1], $startTime[2]);
            $query = mysqli_query($this->connect, "update tbl_times set status_payment = '3', time = '$resultTime', purchased_time = '00:00:00'  where id_time = '$request[id_time]'");
        }
        return ['Tidak ada data'];
    }

    public function delete_time($request, $file = ''){
        $query = mysqli_query($this->connect, "update tbl_times set status_payment = '0', purchased_time = '00:00:00' where id_time = '$request[id_time]'");
    }
    
    public function time_qrcode($request){

    } 

}
?>