<?php

class marques extends Controller {
    function index() {
            $this->view('marques');
    }
    function details($id){
    $data['id'] = $id;
    $this->view('marque');
    }
}


?>