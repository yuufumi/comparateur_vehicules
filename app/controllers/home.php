<?php
class Home extends Controller{
    function index(){
        
        $news = $this->loadModel('pubs');
        $marque = $this->loadModel('marque');
        $data['news'] = $news->getAll();
        $marques = $marque->getAll();
        $comparaisons = $this->loadModel('comparison');
        $data['comps'] = $comparaisons->getAll();
        $data['marques'] = $marques;
        $this->view("homeView",$data);
        
    }
    function logout(){
        $user = $this->loadModel("user");
        $user->logout();
    }

    function login(){
        echo "login nrmlmnt"; 
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