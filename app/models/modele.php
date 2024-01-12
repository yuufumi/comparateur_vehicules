<?php
Class modele extends Database{
    public function insert($data){}
    public function delete($id){}
    public function update($data){}
    public function getById($id){}
    public function getALl(){}
    public function getModele($marque_id){
        $arr['id'] = $marque_id;
        $query = 'SELECT * FROM modele Where modele.marque_id = :id;';
        $data = $this->read($query,$arr);
        return $data;
    }

}
?>