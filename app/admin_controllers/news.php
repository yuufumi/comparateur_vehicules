<?php
class news extends adminController{
    public function index(){
        $news = $this->loadModel('pubs');
        $data['news'] = $news->getAll();
        $this->view('newsView',$data);
    }

    public function edit($a){
        $news = $this->loadModel('pubs');
        $data['news'] = $news->getById($a);
        show($data);
        if(!empty($_POST)){
            $post['id'] = $a;
            $post['image_id'] = $_POST['image_id'];
            $post['titre'] = $_POST['titre'];
            $post['contenu'] = $_POST['contenu'];
            if(!empty($_POST['image_id']) && empty($_POST['image'])){ 
                $post['image'] = false;
            }else{
            $post['image'] = "news"."/".pathinfo($_POST['image'])['filename'];}
            show($post);
            $news->updateNews($post);
            $this->index();
        }else{
            $this->view('editNewsView',$data);
        }
    }

    public function add(){

        $news = $this->loadModel('pubs');
        if(!empty($_POST)){
            $post['titre'] = $_POST['titre'];
            $post['contenu'] = $_POST['contenu'];
            $post['lien'] = "news"."/".pathinfo($_POST['image'])['filename'];
            show($post);
            $news->addNews($post);
            $this->index();
        }else{
            $this->view('addNewsView');
        }
    }
}


?>