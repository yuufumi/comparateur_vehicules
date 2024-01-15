<?php
class vehicules extends Controller {
    function index($a){
        $marque = $this->loadModel('marque');
        $vehicules = $this->loadModel('vehicule');
        $marques = $marque->getAll();
        $avis = $this->loadModel('comment');
        if(isset($_POST['avis'])){
        $check = $avis->insertAvisVehicule($_POST);
        $a = $_POST['vehicule'];
        }
        if(isset($_POST['car'])){
            $check = $vehicules->insertFavoris($_POST);
            $a = $_POST['car'];
        }
        $data['avis'] = $avis->getVehiculeAvis($a);
        $data['vehicule'] = $vehicules->getById($a);
        $data['marques'] = $marques;
        //show($data);
        $this->view('vehiculeview',$data);
    }
}