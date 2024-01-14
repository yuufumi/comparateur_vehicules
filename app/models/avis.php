<?php
Class avis extends Database{
    //public function getAll(){}

    //public function getUserAvis($userId){}

    //public function getMarqueAvis($marqueId){}

    public function getVehiculeAvis($VehiculeId){
        $arr['id'] = $VehiculeId; 
        $query = "SELECT * FROM avis WHERE avis.vehicule_id = :id;";
        $data = $this->read($query,$arr);
        return $data;
    }

    //public function validateAvis($id){}

    //public function blockAvis($id){}

    //public function deleteAvis($id){}

    //public function getByIdAvis($id){}
}
?>