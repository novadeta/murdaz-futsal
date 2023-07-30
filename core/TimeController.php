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
        $isUser = mysqli_query($this->connect, "select * from tbl_times where id_user = '$request[id_user]'");
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d h:i:s");
        if ($isUser->num_rows < 1) {
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
                    $query = mysqli_query($this->connect, "insert into tbl_times(id_user,date,time,purchased_time,payment,status_payment) VALUE('$request[id_user]','$request[date]','$request[time]')");
                }
                $status = "1";
                $query = mysqli_query($this->connect, "insert into tbl_times(id_user,date,time,purchased_time,payment,status_payment) VALUE('$request[id_user]','$request[date]','$request[time]')");
                return ['message' => 'berhasil transaksi'];
            }
            if (file_exists($file['payment']['tmp_name'])) {
                $directory = getcwd();
                $uploadDirectory = "/public/assets/photo_payments/";
                $filename = $file['payment']['name'];
                $explode = explode(".",$filename);
                $extension = strtolower(end($explode));
                $fileTmp  = $file['payment']['tmp_name'];
                $uploadPath = $directory . $uploadDirectory . basename($filename);
                move_uploaded_file($fileTmp,$uploadPath);
                // $query = mysqli_query($this->connect, "insert into tbl_times(id_user,date,time,purchased_time,payment,status_payment) VALUE('$request[id_user]','$request[date]','$request[time]','$request[purchased_time]','$request[payment]','$request[status_payment]')");
            }
            $status = "1";
            $timeUser = $isUser->fetch_assoc();
            $startTime = explode(":", $timeUser['time']);
            $endTime = explode(":", $request['time']);
            $currentTime = $startTime[0] + $endTime[0];
            $resultTime = sprintf('%02d:%02d:%02d', $currentTime, $startTime[1], $startTime[2]);
            var_dump($resultTime);
            $query = mysqli_query($this->connect, "insert into tbl_times(id_user,date,time,purchased_time,payment,status_payment) VALUE('$request[id_user]','$request[date]','$request[time]','$request[purchased_time]','$request[payment]','$request[status_payment]')");
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