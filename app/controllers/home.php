<?php
class Home extends Controller{
    function index(){
        if(isset($_POST['email']) && isset($_POST['password']))
		{	
			$user = $this->loadModel("user");
			$user->login($_POST);
		}
        $news = $this->loadModel('news');
        $marque = $this->loadModel('marque');
        $data['news'] = $news->getAll();
        $marques = $marque->getAll();
        $comparaisons = $this->loadModel('comparison');
        $data['comps'] = $comparaisons->getAll();

        //show($data['comps']);
        $data['marques'] = $marques;
        $this->view("home",$data);
        
    }
}

?>