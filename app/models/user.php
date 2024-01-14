<?php 

Class user extends Database
{
	public function getFavoriteCars($id){
		$arr['id'] = $id;
		$query = "select * from favoris where user_id = :id ";
		$data = $this->read($query,$arr);
		return $data;
	}
	public function getById($id){
		$arr['id'] = $id;
		$query = "select * from user where id = :id limit 1";
		$data = $this->read($query,$arr);
		return $data;
	}
	function login($POST){	
		if(isset($POST['email']) && isset($POST['password']))
		{
			$arr['email'] = $POST['email'];
			$arr['password'] = $POST['password'];
			
			$query = "select * from user where email = :email && password = :password limit 1";
			$data = $this->read($query,$arr);
			if($data)
			{	
				echo "check";
				//logged in
				$_SESSION['id'] = $data[0]->id;
				$_SESSION['nom'] = $data[0]->nom;
				$_SESSION['prenom'] = $data[0]->prenom;
				//header("Location:". ROOT . "home");
			}else{
				$_SESSION['error'] = "wrong username or password";
			}
		}else{

			$_SESSION['error'] = "please enter a valid username and password";
		}
	}

	function signup($POST){
		$_SESSION['error'] = "";
		if(isset($POST['email']) && isset($POST['password']) && isset($POST['nom']) && isset($POST['prenom']) && isset($POST['sexe']) && isset($POST['date_de_naissance']))
		{	
			print_r($_POST);
			$arr['email'] = $POST['email'];
			$arr['password'] = $POST['password'];
			$arr['nom'] = $POST['nom'];
			$arr['prenom'] = $POST['prenom'];
            $arr['sexe'] = $POST['sexe'];
            $arr['date_de_naissance'] = $POST['date_de_naissance'];

			$query = "insert into user (nom,prenom,email,password,sexe,date_de_naissance) values (:nom,:prenom,:email,:password,:sexe,:date_de_naissance)";
			$data = $this->write($query,$arr);
			if($data)
			{
				$this->login($arr);
				die;
			}

		}else{

			$_SESSION['error'] = "please enter a valid username and password";
		}
	}

	function check_logged_in(){
		if(isset($_SESSION['email']))
		{

			$arr['email'] = $_SESSION['email'];

			$query = "select * from users where email = :email && limit 1";
			$data = $this->read($query,$arr);
			if(is_array($data))
			{
				//logged in
 				$_SESSION['email'] = $data[0]->email;
				return true;
			}
		}
		return false;

	}

	function logout(){
		//logged in

		unset($_SESSION['id']);
		unset($_SESSION['nom']);
		unset($_SESSION['prenom']);

		header("Location:". ROOT . "home");
		die;
	}

	function getAll(){
		$this->db_connect();
		$query = "select * from user";
		$data = $this->read($query);
		$this->db_disconnect();
		return $data;
	}



	function delete($id){
		$this->db_connect();
		$query = "delete from user where id =". $id . ";";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		try {
			// Execute the query within a transaction
			$this->db->beginTransaction();
			$stmt->execute();
			$this->db->commit();
			$this->db_disconnect();	
			return true;
		} catch (PDOException $e) {
			// Rollback in case of error
			$this->db->rollBack();
			error_log($e->getMessage());
			$this->db_disconnect();
			return false;
		}
	}	

	function update($POST){


	}
}
?>