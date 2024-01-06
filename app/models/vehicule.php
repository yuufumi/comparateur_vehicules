<?php
Class vehicule extends Database{
    public function insert($data){}
    public function delete($id){}
    public function update($data){}
    public function getById($id){
        $arr['id'] = $id;
        $query = "SELECT * FROM vehicule JOIN image ON vehicule.id = image.vehicule_id JOIN marque ON marque.id= vehicule.marque_id WHERE vehicule.id = :id";
        $data = $this->read($query,$arr);
        return $data;
    }

    public function getByMarque($marqueid){
        $arr['id'] = $marqueid;
        $query = "SELECT * FROM vehicule JOIN image ON vehicule.id = image.vehicule_id WHERE vehicule.marque_id = :id";
        $data = $this->read($query,$arr);
        return $data;

    }
    public function getModeles(){
        $query = "SELECT DISTINCT modele FROM vehicule;";
        $data = $this->read($query);
        return $data;

    }
    public function getVersions(){
        $query = "SELECT DISTINCT version FROM vehicule;";
        $data = $this->read($query);
        return $data;
    }
    public function getAnnee(){
        $query = "SELECT DISTINCT annee FROM vehicule;";
        $data = $this->read($query);
        return $data;

    }
    public function getAll(){
        $query = 'SELECT * FROM vehicule JOIN image ON vehicule.id = image.vehicule_id JOIN marque ON marque.id= vehicule.marque_id;';
        $data = $this->read($query,[]);
        return $data;
    }
}
?>