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
        $_SESSION['token'] = "halo";
        return [
            'status' => 'success',
            'message' => 'selamat login',
        ];
    }
    public function create_user($username,$password){
        $query = mysqli_query($this->connect, "insert into tbl_users(username,password) values('$username','$password','2')");
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