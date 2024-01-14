<?php

class admin extends Controller{

    function index(){
        $this->view('loginAdmin');
        if(isset($_POST['username']) && isset($_POST['password'])){
            if($_POST['username'] === "admin" && md5($_POST['password'] === md5("admin"))){
            $_SESSION['admin'] = $_POST['username'];
            $_SESSION['password'] = md5($_POST['password']);
            $this->view("admin");
            }else{
                error_log($_SESSION['error']);
            }
        }
    }
}
?>