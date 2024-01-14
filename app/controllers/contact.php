<?php
Class Contact extends Controller {
    function index(){
        $contact = $this->loadModel('contacts');
        $data["contact"] = $contact->getContact();
        $this->view('contact',$data);
    }
} 
?>