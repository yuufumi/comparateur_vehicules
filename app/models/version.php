<?php
Class version extends Database{
    public function insert($data){}
    public function delete($id){}
    public function update($data){}
    public function getById($id){}
    public function getALl(){}
    public function getVersions($modele_id){
        $arr['id'] = $modele_id;
        $query = 'SELECT * FROM version Where version.modele_id = :id;';
        $data = $this->read($query,$arr);
        return $data;
    }
    public function getAnnees($version){
        //$arr['version_name'] = $version;
        $query = "SELECT * FROM `version` Where `version` LIKE '$version%'";
        $data = $this->read($query);
        return $data;
    }

}
?>