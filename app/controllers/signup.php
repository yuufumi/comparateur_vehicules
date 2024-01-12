<?php

Class Signup extends Controller 
{
	function index()
	{

 	 	if(isset($_POST))
 	 	{	
			  $user = $this->loadModel("user");
 	 		  $user->signup($_POST);
			  
		}elseif(isset($_POST['username']) && !isset($_POST['email'])){
			
			$user = $this->loadModel("user");
			$user->login($_POST);
		}
		
		$this->view("signup");
	}

}