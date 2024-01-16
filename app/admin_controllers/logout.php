<?php
class logout extends adminController{
    public function index(){
        unset($_SESSION['admin']);
		unset($_SESSION['passwordAdmin']);
		unset($_SESSION['error']);

		header("Location:". ADMIN);
		die;
    }
}

?>