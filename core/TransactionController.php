<?php 
include_once "../services/database.php";
class UserController extends Database{
    public function __construct()
    {
        parent::__construct();
    }
    public function checkUser($username,$password){
        $query = mysqli_query($this->connect, "select * from tbl_users where username = $username and password = $password");
        if ($query <= 1) {
            echo "
            <script>
                document.location = './index.php'; 
            </script>
            ";
            return false;
        }
        return true;
    }
    public function create_user($username,$password){
        $query = mysqli_query($this->connect, "insert into tbl_users(username,password) values('$username','$password','2')");
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
?>