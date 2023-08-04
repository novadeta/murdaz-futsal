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
            $query = mysqli_query($this->connect, "select * from tbl_transactions where date_play = '$request[date_play]' and id_field = '$request[id_field]' and status IN ('1','2','3') ORDER BY start_time ASC");
            if ($query->num_rows < 1) {
                return ["data" => "Tidak ada data"];
            }
            while($row = mysqli_fetch_array($query)){
                $result[] = $row; 
            }
            return $result ?? [];
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
        (start_time >= '$request[start_time]' and end_time <= '$request[end_time]')) and status IN ('1','2','3') ");
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
            $query = mysqli_query($this->connect, "insert into tbl_transactions(id_user,id_field,date,date_play,start_time,end_time,payment,price,status) values('$request[id_user]','$request[id_field]','$date','$request[date_play]','$request[start_time]','$request[end_time]','$filename','$request[price]','$status')");
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
            return $result ?? [];
        }else if(isset($request['id_transaction'])){
            $query = mysqli_query($this->connect, "select * from tbl_transactions inner join tbl_users on tbl_transactions.id_user = tbl_users.id_user where tbl_transactions.id_transaction = '$request[id_transaction]' and tbl_transactions.id_user = '$request[id_user]'");
            if ($query->num_rows < 1) {
                return [];
            }
            return $query->fetch_assoc();
        }
        $query = mysqli_query($this->connect, "select tbl_transactions.date,tbl_transactions.date_play,tbl_transactions.start_time,tbl_transactions.end_time,tbl_transactions.payment,tbl_transactions.price,tbl_transactions.status,tbl_fields.field_name from tbl_transactions join tbl_fields on tbl_transactions.id_field = tbl_fields.id_field where tbl_transactions.status IN ('0','3') and tbl_transactions.id_user = '$request' order by date_play desc");
        while($row = mysqli_fetch_array($query)){
            $result[] = $row; 
        }
        return $result;
    }
    public function edit_transaction($request){
        if (file_exists($_FILES['payment']['tmp_name'])) {
            $directory = getcwd();
            $uploadDirectory = "/public/assets/photo_payments/";
            $filename = $_FILES['payment']['name'];
            $explode = explode(".",$filename);
            $extension = strtolower(end($explode));
            $fileTmp  = $_FILES['payment']['tmp_name'];
            $uploadPath = $directory . $uploadDirectory . basename($filename);
            move_uploaded_file($fileTmp,$uploadPath);
            $query = mysqli_query($this->connect, "update tbl_transactions set status='$request[status]',payment = '$filename' where id_transaction = '$request[id_transaction]' ");
            return ['message' => 'berhasil kirim'];
        }
        $query = mysqli_query($this->connect, "update tbl_transactions set status='3' where id_transaction = '$request[id_transaction]' ");
        return ['message' => 'berhasil diterima'];
    }
    public function delete_transaction($request){  
        $query = mysqli_query($this->connect, "update tbl_transactions set status='0' where id_transaction = '$request[id_transaction]' ");
    }
    
    public function transaction_qrcode($request){
        if ($request['start_time'] == $request['end_time']) {
            return ['error' => 'Harus selisih 1 Jam'];
        }
        $start = $request['start_time'];
        $end = $request['end_time'];
        if ($end < $start) {
            return ['error' => 'Jam akhir tidak boleh lebih awal dari Jam awal'];
        }
        $isTime = mysqli_query($this->connect, "select * from tbl_transactions where date_play = '$request[date_play]' and id_field = '$request[id_field]' and
        ((start_time <= '$request[start_time]' and end_time > '$request[start_time]') or
        (start_time < '$request[end_time]' and end_time >= '$request[end_time]') or
        (start_time >= '$request[start_time]' and end_time <= '$request[end_time]')) and status IN ('1','2','3') ");
        if ($isTime->num_rows >= 1) {
            return ['error' => 'Waktu Sudah ada yang booking'];
        }           
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d h:i:s");
        $day = strtolower(date('l', strtotime($date)));
        if ($day == 'monday') {
            $type_price = 'Libur';
            $price = 150000;
        }elseif ($request['start_time'] >= "08:00:00" && ($request['end_time'] <= "17:59:00" && $request['end_time'] != '00:00:0')) {
            $type_price = 'Normal';
            $price = 100000;
        }elseif ($request['start_time'] >= "18:00:00" && ($request['end_time'] <= "23:00:00" || $request['end_time'] == "00:00:0")) {
            $type_price = 'Malam';
            $price = 120000;
        }else{
            $type_price = '';
            $price = 0;
        }

        $sql = mysqli_query($this->connect, "select * from tbl_times where id_user = '$request[id_user]' and type_price = '$type_price'");
        
        if ($sql->num_rows < 1) {
            return ['error' => 'Kamu tidak punya paket jam fleksibel di jam tersebut'];
        }
        $timeUser = $sql->fetch_assoc();
        $startTime = explode(":", $request['start_time']);
        $endTime = explode(":", $request['end_time']);
        $differenceTime = intval($endTime[0]) - intval($startTime[0]);
        $resultTime_ = sprintf('%02d:%02d:%02d', $differenceTime, $startTime[1], $startTime[2]);
        if ($timeUser['time'] < $resultTime_ ) {
            return ['error' => 'Kamu tidak memiliki jam yang cukup'];
        }
        
        $totalPrice = intval($price) * intval($differenceTime);
        $time = explode(":", $timeUser['time']);
        $totalTime = intval($time[0]) - intval($differenceTime);
        $resultTime = sprintf('%02d:%02d:%02d', $totalTime, $startTime[1], $startTime[2]);
        $query = mysqli_query($this->connect, "update tbl_times set time = '$resultTime' where id_time = '$timeUser[id_time]'");
        $status = "3";
        $query = mysqli_query($this->connect, "insert into tbl_transactions(id_user,id_field,date,date_play,start_time,end_time,price,status) values('$timeUser[id_user]','$request[id_field]','$date','$request[date_play]','$request[start_time]','$request[end_time]','$totalPrice','$status')");
        return ['error' => 'Berhasil Membeli'];
    }
}
?>