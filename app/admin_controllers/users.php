<?php
class users extends adminController{
    public function index(){
        $users = $this->loadModel('user');
        if(!empty($_POST['sort'])){
        $data['users'] = $users->getAll($_POST['sort']);
        }elseif(!empty($_POST['filter'])){
            if(isset($_POST['filter']['sexe'])){
                $data['users'] = $users->FilterBySexe($_POST['filter']['sexe']);
            }elseif(isset($_POST['statut'])){
                $data['users'] = $users->FilterByStatus($_POST['statut']);
            }else{
                $data['users'] = $users->getAll();
            }
        }else{
            $data['users'] = $users->getAll();
        }
        $this->view('usersView',$data);
    }
    public function edit($a){
        $users = $this->loadModel('user');
        $data['users'] = $users->getById($a);
        if(!empty($_POST)){
            $users->update($a,$_POST);
            $this->index();
        }else{
        $this->view('editUserView',$data);
        }
    }
}

?>