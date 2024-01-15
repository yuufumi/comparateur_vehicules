<?php

class news extends Controller{
    public function index($a = ""){
        $news = $this->loadModel('pubs');
        if(!$a){
            $data['news'] = $news->getAll();
            $this->view('news',$data);
        }else{
            $data['details'] = $news->getById($a);
            $this->view('details-news',$data);
        }
    }
}

?>