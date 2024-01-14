<?php

class avis extends Controller{
function index(){
    $vehicules = $this->loadModel('vehicule');
    $data['vehicules'] = $vehicules->getAll(["vehicule.id","vehicule.nom","image.lien"]);
    //show($data['vehicules']);
    $this->view('avis',$data);
}
function details($a){
    $vehicules = $this->loadModel('vehicule');
    $avis = $this->loadModel('comment');
    $data['vehicule'] = $vehicules->getById($a)[0];
    //show($data['vehicule']);
    $data['avis'] = $avis->getVehiculeAvis($a);
    //show($data);
    $this->view('avis-vehicule',$data);
}
}
?>