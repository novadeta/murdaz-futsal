<?php 
include_once "../services/database.php";
class UserController extends Database{
    public function __construct()
    {
        parent::__construct();
    }
    public function create_field($username,$password){
        $query = mysqli_query($this->connect, "insert into tbl_users(username,password) values('$username','$password')");
    }
    public function show_field(){

    }
    public function edit_field(){
        
    }
    public function delete_field(){

    }
    

}
?>