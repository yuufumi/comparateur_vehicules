<?php
class profile extends Controller {
    function index() {
        $user = $this->loadModel('user');
        $data['user'] = $user->getById($_SESSION['id']);
        $favoriteCars = $user->getFavoriteCars($_SESSION['id']);
        $avis = $this->loadModel('comment');
        $vehicules = $this->loadModel('vehicule');
        $data['favoris'] = array();
        foreach($favoriteCars as $row){
            array_push($data["favoris"],$vehicules->getById($row->vehicule_id));
        }
        $data['avis'] = $avis->getUserAvis($_SESSION['id']);

        $this->view('profile',$data);
    }
}