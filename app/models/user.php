<?php 

Class user extends Database
{

	public function update($id,$post){
		$query = "UPDATE user SET nom = :nom, prenom= :prenom, email= :email, password = :password, date_de_naissance= :date_de_naissance, sexe= :sexe, statut= :statut WHERE id = ".$id.";";
		$check = $this->write($query,$post);
		return $check;	
	} 

	
    public function updateStatus($post){
        $query = "UPDATE user SET statut = :statut WHERE id = :user";
		$_SESSION['statut'] = $post['statut'];
        $check = $this->write($query,$post);
    }
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
			
			$query = "select * from user where email = :email && password = :password && statut <> 'pending' limit 1";
			$data = $this->read($query,$arr);
			if($data)
			{	
				//logged in
				$_SESSION['id'] = $data[0]->id;
				$_SESSION['nom'] = $data[0]->nom;
				$_SESSION['prenom'] = $data[0]->prenom;
				$_SESSION['statut'] = $data[0]->statut;
				//header("Location:". ROOT . "home");
			}else{
				$_SESSION['error'] = "wrong username or password or not yet approved by admin";
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
			header('Location: '.ROOT);
			if($data)
			{
				$this->login($arr);
				die;
			}

		}else{

			$_SESSION['error'] = "please enter a valid username and password";
		}
	}

	function delete($id){
		unset($_SESSION['id']);
		unset($_SESSION['nom']);
		unset($_SESSION['prenom']);
		unset($_SESSION['statut']);
		$arr['id'] = $id;
		$query = 'delete from user where id = :id';
		$check = $this->write($query,$arr);
		return $check;

	}

	function logout(){
		//logged in

		unset($_SESSION['id']);
		unset($_SESSION['nom']);
		unset($_SESSION['prenom']);
		unset($_SESSION['statut']);

		header("Location:". ROOT);
		die;
	}

	function getAll($sortedBy = ""){
		if($sortedBy!==''){
			$query = "select * from user ORDER BY ".$sortedBy." ASC";
			$data = $this->read($query);
		}else{
			$query = "select * from user";
			$data = $this->read($query);
		}
		
		return $data;
	}

	function FilterByStatus($status){
		$arr['statut'] = $status;
		$query = "select * from user where statut= :statut";
		$data = $this->read($query,$arr);
		return $data;
	}

	function FilterBySexe($sexe){
		$arr['sexe'] = $sexe;
		$query = "select * from user where sexe= :sexe";
		$data = $this->read($query,$arr);
		return $data;
	}
}
?>