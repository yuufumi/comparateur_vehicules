<?php
class Home extends Controller{
    function index(){
        $news = $this->loadModel('news');
        $marque = $this->loadModel('marque');
        $vehicule = $this->loadModel('vehicule');
        //$comparaisons = $this->loadModel('comparaisonsModel');
        $data['news'] = $news->getAll();
        $data['marque'] = $marque->getAll();
        $data['modeles'] = $vehicule->getModeles();
        $data['versions'] = $vehicule->getVersions();
        $data['annee'] = $vehicule->getAnnee();
        //$comparaisons = $comparaisons->getAll();
      
        $this->view("home",$data);
        
    }
}

?>