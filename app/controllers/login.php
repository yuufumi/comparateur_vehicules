<?php
class login extends Controller 
{
	function index()
	{
		$this->view("login");
		if(isset($_POST['email']) && isset($_POST['password']))
		{	
			$user = $this->loadModel("user");
			$user->login($_POST);
		}
	}

}

?>