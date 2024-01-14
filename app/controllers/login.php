<?php
class login extends Controller 
{
	function index()
	{	
		
		if(!empty($_POST)){
			if((!empty($_POST['email'])) && (!empty($_POST['password'])))
			{	
				$user = $this->loadModel("user");
				$user->login($_POST);
				if(empty($_SESSION['error'])){
					header("Location:".ROOT);
				}
			}elseif(empty($_POST['email']) || empty($_POST['password'])){
				$_SESSION['error'] = "Email and password are required";
			}
		}else{
			unset($_SESSION['error']);
		}
		
		$this->view("login");
	}

}

?>