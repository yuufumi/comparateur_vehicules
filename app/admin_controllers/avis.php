<?php
class avis extends adminController{
    public function index(){
        $avis = $this->loadModel('comment');
        $users = $this->loadModel('user');
        if(isset($_GET['action'])){
            if (isset($_GET['user'])){
                // update the user status
                $post['user'] = $_GET['user'];
                $post['statut'] = $_GET['action'];
                $users->updateStatus($post);
            }else if (isset($_GET['avis_id'])){
                //update the comment status
                $post['avis'] = $_GET['avis_id'];
                $post['statut'] = $_GET['action'];
                $avis->updateStatus($post);
            }
        }
        $data['avis'] = $avis->getAll();
        //show($data['avis'][0]);
        $this->view('avisView',$data);
    }
}


?>