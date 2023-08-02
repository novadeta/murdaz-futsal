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
        }  
        if (isset($request['id_user'])) {
            $query = mysqli_query($this->connect, "select * from tbl_times where id_user = '$request[id_user]'");
            $result = $query->fetch_assoc();
            return $result ?? [];
        }
    }


    public function create_time($request,$file = ""){
        $isUser = mysqli_query($this->connect, "select * from tbl_times where id_user = '$request[id_user]'");
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
                $query = mysqli_query($this->connect, "insert into tbl_times(id_user,date,time,purchased_time,payment,status_payment) VALUE('$request[id_user]','$date',time = '00:00:00','$request[time]','$filename','$status_payment')");
                return ['message' => 'berhasil transaksi'];
            }
            $status_payment = "1";
            $query = mysqli_query($this->connect, "insert into tbl_times(id_user,date,time,purchased_time,status_payment) VALUE('$request[id_user]','$date',time = '00:00:00','$request[time]','$status_payment')");
            return ['message' => 'berhasil transaksi'];
        }

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
            $query = mysqli_query($this->connect, "update tbl_times set date = '$date',time = '00:00:00', purchased_time = '$request[time]', payment = '$filename', status_payment = '$status_payment' where id_user = '$request[id_user]')");
            return ['message' => 'berhasil membeli waktu'];
        }
        // if not payment
        $status_payment = "1";
        $query = mysqli_query($this->connect, "update tbl_times set date = '$date', purchased_time = '$request[time]','$status_payment')");
        return ['message' => 'berhasil transaksi'];
    }
        
    public function show_time($request){
        if (isset($request['status'])) {
            $query = mysqli_query($this->connect, "select * from tbl_transactions where id_user = '$request[id_user]' and status = '$request[status]' and id_field = '$request[id_field]'");
            while($row = mysqli_fetch_array($query)){
                $result[] = $row; 
            }
            return $result;
        }else if(isset($request['id_transaction'])){
            $query = mysqli_query($this->connect, "select * from tbl_transactions inner join tbl_users on tbl_transactions.id_user = tbl_users.id_user where tbl_transactions.id_transaction = '$request[id_transaction]' and tbl_transactions.id_user = '$request[id_user]'");
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
        $sql = mysqli_query($this->connect, "select * from tbl_times where id_time = '$request[id_time]'");
        $timeUser = $sql->fetch_assoc();
        $startTime = explode(":", $timeUser['time']);
        $endTime = explode(":", $request['purchased_time']);
        $currentTime = intval($startTime[0]) + intval($endTime[0]);
        $resultTime = sprintf('%02d:%02d:%02d', $currentTime, $startTime[1], $startTime[2]);
        $query = mysqli_query($this->connect, "update tbl_times set status_payment = '3', time = '$resultTime', purchased_time = '00:00:00'  where id_time = '$request[id_time]'");
    }

    public function delete_time($request, $file = ''){
        $query = mysqli_query($this->connect, "update tbl_times set status_payment = '0', purchased_time = '00:00:00' where id_time = '$request[id_time]'");
    }
    

}
?>