<?php 
$root = dirname(__DIR__);
include_once "$root/services/database.php";
class UserController extends Database{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_user($request = ""){
        if ($request) {
            $query_mysql = "select * from tbl_users where username = '$request[username]'";
            $query = mysqli_query($this->connect, $query_mysql);
            if ($query->num_rows > 0) {
                return [
                    'data' => $query->fetch_assoc(),
                    'status' => 'username-exists',
                    'message' => 'Username sudah ada'
                ];
            }
        }
        $query_mysql = "select * from tbl_users where role = '2'";
        $query = mysqli_query($this->connect, $query_mysql);
        while($row = mysqli_fetch_array($query)){
            $result[] = $row; 
        }
        return $result;
    }
    public function checkuser($request){
        $query = mysqli_query($this->connect, "select * from tbl_users where username = '$request[username]' and password = '$request[password]' and role = '$request[role]' ");
        $status = mysqli_query($this->connect, "select * from tbl_users where username = '$request[username]' and password = '$request[password]' and role = '$request[role]' and status = 'Aktif' ");
        $count_status =  mysqli_num_rows($status);
        $count =  mysqli_num_rows($query);
        if ($count_status < 1) {
            return [
                'status' => 'akun',
                'message' => 'Akunmu Dinonaktifkan',
            ];
        }
        $count =  mysqli_num_rows($query);
        if ($count < 1) {
            return [
                'status' => 'error',
                'message' => 'username dan password salah',
            ];
        }
        $result = $query->fetch_assoc();
        $_SESSION['username'] = $result['username'];
        $_SESSION['password'] = $result['password'];
        $_SESSION['role'] = $result['role'];
        return [
            'status' => 'success',
            'message' => 'selamat login',
        ];
    }
    public function create_user($request){
        $query_mysql = "select * from tbl_users where username = '$request[username]'";
        if($request['password'] !== $request['password2'])  return ['status' => 'not-match','message' => 'Pastikan password sama'];
        $query = mysqli_query($this->connect, $query_mysql);
        if ($query->num_rows > 0) {
            return [
                'status' => 'username-exists',
                'message' => 'Username sudah ada'
            ];
        }
        
        $result = mysqli_query($this->connect, "insert into tbl_users(username,password,role) values('$request[username]','$request[password]','$request[role]')");
        return [
            'status' => 'success',
            'message' => 'Berhasil membuat akun',
        ];
    }
    public function show_user($request = ""){
        $query = mysqli_query($this->connect, "select * from tbl_users where id_user = '$request[id_user]' ");
        return $query->fetch_assoc();
    }
    public function edit_user($id_user){
        $query = mysqli_query($this->connect, "select * from tbl_users where id_user = '$id_user' ");
    }
    public function delete_user($id_user){  
        $query = mysqli_query($this->connect, "delete from tbl_users where id_user = '$id_user' ");
    }
    public function status_user($request){
        $query = mysqli_query($this->connect, "update tbl_users set status = '$request[status]' where id_user = '$request[id_user]'");
    }
}
?>