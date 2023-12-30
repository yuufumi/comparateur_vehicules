<?php 

Class User 
{

	function login($POST)
	{
		$DB = new Database();

		$_SESSION['error'] = "";
		if(isset($POST['email']) && isset($POST['password']))
		{

			$arr['email'] = $POST['email'];
			$arr['password'] = $POST['password'];

			$query = "select * from user where email = :email && password = :password limit 1";
			$data = $DB->read($query,$arr);
			if(is_array($data))
			{
 				//logged in
 				$_SESSION['email'] = $data[0]->email;
				$_SESSION['password'] = md5($data[0]->password);

				header("Location:". ROOT . "home");
				die;

			}else{

				$_SESSION['error'] = "wrong username or password";
			}
		}else{

			$_SESSION['error'] = "please enter a valid username and password";
		}

	}

	function signup($POST)
	{

		$DB = new Database();

		$_SESSION['error'] = "";
		if(isset($POST['email']) && isset($POST['password']))
		{

			$arr['email'] = $POST['email'];
			$arr['password'] = $POST['password'];
			$arr['nom'] = $POST['nom'];
			$arr['prenom'] = $POST['prenom'];
            $arr['sexe'] = $POST['sexe'];
            $arr['date_de_naissance'] = $POST['date_de_naissance'];

			$query = "insert into users (nom,prenom,email,password,sexe,date_de_naissance) values (:nom,:prenom,:email,:password,:sexe,:date_de_naissance)";
			$data = $DB->write($query,$arr);
			if($data)
			{
				
				header("Location:". ROOT . "login");
				die;
			}

		}else{

			$_SESSION['error'] = "please enter a valid username and password";
		}
	}

	function check_logged_in()
	{

		$DB = new Database();
		if(isset($_SESSION['email']))
		{

			$arr['email'] = $_SESSION['email'];

			$query = "select * from users where email = :email && limit 1";
			$data = $DB->read($query,$arr);
			if(is_array($data))
			{
				//logged in
 				$_SESSION['email'] = $data[0]->email;
				return true;
			}
		}

		return false;

	}

	function logout()
	{
		//logged in
		unset($_SESSION['email']);
		unset($_SESSION['password']);

		header("Location:". ROOT . "login");
		die;
	}


}
?>