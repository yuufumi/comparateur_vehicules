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
    $data['marque'] = $marques->getById($id);
    $data['vehicule'] = $vehicules->getByMarque($id);
    $this->view('marque',$data);
    }
}


?>