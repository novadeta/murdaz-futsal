<?php 
$root = dirname(__DIR__);
include_once "$root/services/database.php";
class TransactionController extends Database{
    var $file_path = "";
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
        }elseif (isset($request['select_date']) ) {
            if ($request['select_date']== 'month') {
                $early_date = date('Y-m') . '-01';
                $last_date = date('Y-m-t', strtotime($early_date));
                $query = mysqli_query($this->connect,"select price from tbl_transactions where date between '$early_date 00:00:00' and '$last_date 23:59:59' and status = '3'");
                $result = 0;
                while($row = mysqli_fetch_array($query)){
                    $convertInteger = intval($row['price']);
                    $result += $convertInteger;
                }
                return $result;
            }else if($request['select_date']== 'today'){
                $today = date('Y-m-d') ;
                $query = mysqli_query($this->connect,"select price from tbl_transactions where date_play = '$today' and status = '3'");
                $result = 0;
                while($row = mysqli_fetch_array($query)){
                    $convertInteger = intval($row['price']);
                    $result += $convertInteger;
                }
                return $result;
            }else {
                $query = mysqli_query($this->connect, "select * from tbl_transactions ");
                while($row = mysqli_fetch_array($query)){
                    $result[] = $row; 
                }
                return $result;
            }
        }elseif (isset($request['status'])) {
           if ($request['status'] == 'validation') {
            $query = mysqli_query($this->connect, "select * from tbl_transactions join tbl_users on tbl_transactions.id_user = tbl_users.id_user where tbl_transactions.status = '2'");
            while($row = mysqli_fetch_array($query)){
                $result[] = $row; 
            }
            return $result ?? [];
        }elseif ($request['status'] == 'history') {
            $query = mysqli_query($this->connect, "select * from tbl_transactions join tbl_users on tbl_transactions.id_user = tbl_users.id_user where tbl_transactions.status = '3'");
            while($row = mysqli_fetch_array($query)){
                $result[] = $row; 
            }
            return $result ?? [];
        }else{
            return false;
        }
        }
        else {
            $query = mysqli_query($this->connect, "select * from tbl_transactions ");
            while($row = mysqli_fetch_array($query)){
                $result[] = $row; 
            }
            return $result;
        }
    }


    public function create_transaction($request,$file = ""){
        if ($request['start_time'] == $request['end_time']) {
            return ['status' => 'error', 'message' => 'Harus selisih 1 Jam'];
        }
        $isTime = mysqli_query($this->connect, "select * from tbl_transactions where date_play = '$request[date_play]' and id_field = '$request[id_field]' and
        ((start_time <= '$request[start_time]' and end_time > '$request[start_time]') or
        (start_time < '$request[end_time]' and end_time >= '$request[end_time]') or
        (start_time >= '$request[start_time]' and end_time <= '$request[end_time]')) ");
        if ($isTime->num_rows >= 1) {
            return ['status' => 'error', 'message' => 'Waktu Sudah ada yang booking'];
        }
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
            $query = mysqli_query($this->connect, "insert into tbl_transactions(id_user,id_field,date,date_play,start_time,end_time,price,status) values('$request[id_user]','$request[id_field]','$request[date]','$request[date_play]','$request[start_time]','$request[end_time]','$filename','$request[price]','$status')");
            return ['message' => 'berhasil'];
        }
        if (isset($request['role']) && $request['role'] == '1') {
            $status = "3";
            $query = mysqli_query($this->connect, "insert into tbl_transactions(id_user,id_field,date,date_play,start_time,end_time,price,status) values('$request[id_user]','$request[id_field]','$date','$request[date_play]','$request[start_time]','$request[end_time]','$request[price]','$status')");
            return ['message' => 'berhasil transaksi'];
        }
        $status = "1";
        $query = mysqli_query($this->connect, "insert into tbl_transactions(id_user,id_field,date,date_play,start_time,end_time,price,status) values('$request[id_user]','$request[id_field]','$date','$request[date_play]','$request[start_time]','$request[end_time]','$request[price]','$status')");
        return ['message' => 'berhasil transaksi'];
    }


    public function show_transaction($request){
        if (isset($request['status'])) {
            $query = mysqli_query($this->connect, "select * from tbl_transactions where id_user = '$request[id_user]' and status = '$request[status]' ");
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
        $query = mysqli_query($this->connect, "select * from tbl_transactions where id_user = '$request' ");
        while($row = mysqli_fetch_array($query)){
            $result[] = $row; 
        }
        return $result;
    }
    public function edit_transaction($request){
        // if (file_exists($_FILES['payment']['tmp_name'])) {
        //     $directory = getcwd();
        //     $uploadDirectory = "/public/assets/photo_payments/";
        //     $filename = $_FILES['payment']['name'];
        //     $explode = explode(".",$filename);
        //     $extension = strtolower(end($explode));
        //     $fileTmp  = $_FILES['payment']['tmp_name'];
        //     $uploadPath = $directory . $uploadDirectory . basename($filename);
        //     move_uploaded_file($fileTmp,$uploadPath);
        //     $query = mysqli_query($this->connect, "update tbl_transactions set status='$request[status]',payment where id_transaction = '$request[id_transaction]' and id_user = '$request[id_user]' ");
        //     return ['message' => 'berhasil kirim'];
        // }
        $query = mysqli_query($this->connect, "update tbl_transactions set status='$request[status]' where id_transaction = '$request[id_transaction]' and id_user = '$request[id_user]' ");
        return ['message' => 'berhasil diterima'];
    }
    public function delete_transaction($request){  
        $query = mysqli_query($this->connect, "delete from tbl_transactions where id_transaction = '$request[id_transaction]' and id_user = '$request[id_user]' ");
    }
    

}
?>