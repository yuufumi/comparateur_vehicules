<?php

class marques extends Controller {
    function index() {
        $marques = $this->loadModel('marque');
        $data['marques'] = $marques->getAll();
        
        $this->view('marquesView',$data);
    }
    function details($id){

    $marques = $this->loadModel('marque');
    $vehicules = $this->loadModel('vehicule');
    $avis = $this->loadModel('comment');
    if(!empty($_POST)){
        $check = $avis->insertAvisMarque($_POST);

    }
    $data['marque'] = $marques->getById($id);
    $data['vehicule'] = $vehicules->getByMarque($id);
    $data['avis'] = $avis->getMarqueAvis($id);
    $this->view('marqueView',$data);
    }
}


?>