<?php
 class Database{
    protected $user = "root";
    protected $pass = "";
    protected $server = "localhost";
    protected $database = "murdaz_futsal";
    public $connect = null; 
    public function __construct()
    {
        $this->connect = mysqli_connect($this->server, $this->user, $this->pass, $this->database);
    }
 }
?>