<?php
Class marque extends Database{
    public function insert($data){}
    public function delete($id){}
    public function update($data){}
    public function getById($id){
        $arr['id'] = $id;
        $query = "SELECT * FROM marque JOIN image ON marque.id = image.marque_id WHERE marque.id = :id";
        $data = $this->read($query,$arr);
        return $data;
    }
    public function getAll(){
        $query = 'SELECT * FROM marque JOIN image ON marque.id = image.marque_id;';
        $data = $this->read($query,[]);
        return $data;
    }
}
?>