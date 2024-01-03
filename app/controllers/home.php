<?php
class Home extends Controller{
    function index(){
        $news = $this->loadModel('newsModel');
        $marque = $this->loadModel('marqueModel');
        $this->view("home");
        
    }
}

?>