<?php

class marques extends Controller {
    function index() {
        $marques = $this->loadModel('marque');
        $data['marques'] = $marques->getAll();
        
        $this->view('marques',$data);
    }
    function details($id){

    $marques = $this->loadModel('marque');
    $vehicules = $this->loadModel('vehicule');
    $avis = $this->loadModel('comment');
    if(!empty($_POST)){
        print_r($_POST['user']);
        print_r($_POST['marque']);
        print_r($_POST['avis']);
        print_r($_POST['note']);
        $check = $avis->insertAvisMarque($_POST);
        print_r($check);

    }
    $data['marque'] = $marques->getById($id);
    $data['vehicule'] = $vehicules->getByMarque($id);
    $data['avis'] = $avis->getMarqueAvis($id);
    //show($data['marque']);
    $this->view('marque',$data);
    }
}


?>