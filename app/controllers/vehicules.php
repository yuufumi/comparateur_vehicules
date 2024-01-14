<?php
class vehicules extends Controller {
    function index($a){
        $marque = $this->loadModel('marque');
        $vehicules = $this->loadModel('vehicule');
        $marques = $marque->getAll();
        $avis = $this->loadModel('comment');
        if(isset($_POST['avis'])){
        print_r($_POST['user']);
        print_r($_POST['vehicule']);
        print_r($_POST['avis']);
        print_r($_POST['note']);
        $check = $avis->insertAvisVehicule($_POST);
        print_r($check);
        $a = $_POST['vehicule'];
        }
        if(isset($_POST['car'])){
            print_r($_POST['user']);
            print_r($_POST['car']);
            $check = $vehicules->insertFavoris($_POST);
            print_r($check);
            $a = $_POST['car'];
        }
        $data['avis'] = $avis->getVehiculeAvis($a);
        $data['vehicule'] = $vehicules->getById($a);
        $data['marques'] = $marques;
        //show($data);
        $this->view('vehicule',$data);
    }
}