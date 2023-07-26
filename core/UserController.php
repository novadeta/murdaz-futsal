<?php 
include_once "../services/database.php";
class UserController extends Database{
    public function __construct()
    {
        parent::__construct();
    }
    public function checkuser($request){
        $query = mysqli_query($this->connect, "select * from tbl_users where username = '$request[username]' and password = '$request[password]' and role = '$request[role]'");
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
    public function show_user($id_user){
        $query = mysqli_query($this->connect, "delete from tbl_users where id_user = '$id_user' ");
    }
    public function edit_user($id_user){
        $query = mysqli_query($this->connect, "delete from tbl_users where id_user = '$id_user' ");
    }
    public function delete_user($id_user){  
        $query = mysqli_query($this->connect, "delete from tbl_users where id_user = '$id_user' ");
    }
    

}
return json_encode([
    "halo" => "halo"
]);
?>