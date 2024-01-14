<?php
class vehicules extends Controller {
    function index($a){
        $marque = $this->loadModel('marque');
        $vehicules = $this->loadModel('vehicule');
        $marques = $marque->getAll();
        $avis = $this->loadModel('comment');
        if(!empty($_POST)){
        print_r($_POST['user']);
        print_r($_POST['vehicule']);
        print_r($_POST['avis']);
        print_r($_POST['note']);
        $check = $avis->insertAvisVehicule($_POST);
        print_r($check);
        }
        $data['avis'] = $avis->getVehiculeAvis($a);
        $data['vehicule'] = $vehicules->getById($a);
        $data['marques'] = $marques;
        $this->view('vehicule',$data);
    }
}