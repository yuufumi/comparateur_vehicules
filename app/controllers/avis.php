<?php

class avis extends Controller{
function index(){
    $vehicules = $this->loadModel('vehicule');
    $data['vehicules'] = $vehicules->getAll(["vehicule.id","vehicule.nom","image.lien"]);
    $this->view('avisView',$data);
}
function details($a){
    $vehicules = $this->loadModel('vehicule');
    $avis = $this->loadModel('comment');
    $data['vehicule'] = $vehicules->getById($a)[0];

    $data['avis'] = $avis->getVehiculeAvis($a);
    $this->view('avisVehicule',$data);
}
}
?>