<?php
class vehicules extends Controller {
    function index($a){
        $marque = $this->loadModel('marque');
        $vehicules = $this->loadModel('vehicule');
        $marques = $marque->getAll();
        $data['vehicule'] = $vehicules->getById($a);
        $data['marques'] = $marques;
        $this->view('vehicule',$data);
    }
}