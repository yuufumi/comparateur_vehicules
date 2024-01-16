<?php

class admin extends adminController{

    function index(){
        if(!empty($_POST)){
            if((!empty($_POST['username'])) && (!empty($_POST['password']))){   
                if($_POST['username'] === "admin" && md5($_POST['password'] === md5("admin"))){
                    $_SESSION['admin'] = $_POST['username'];
                    $_SESSION['passwordAdmin'] = md5($_POST['password']);
                    $this->view('adminView');
                }else{
                $_SESSION['error'] = "Vous n'êtes pas un admin";
                $this->view('loginAdmin');
                }
            }elseif(empty($_POST['username']) || empty($_POST['password'])){
                $_SESSION['error'] = "Username and password are required";
                $this->view('loginAdmin');    
            }
        }else{
            unset($_SESSION['error']);
            if(isset($_SESSION['admin']) && isset($_SESSION['passwordAdmin'])){
                if($_SESSION['admin'] === "admin" && md5($_SESSION['passwordAdmin'] === md5("admin"))){
                    $this->view('adminView');
                }
            }else{
                $this->view('loginAdmin');
            }
            
        }
        
    }
}
?>