<?php
Class pubs extends Database{
    public function insert($data){}
    public function delete($id){}
    public function update($data){}
    public function getById($id){
        $arr['id'] = $id;
        $query = 'SELECT * FROM news JOIN image ON news.id = image.news_id WHERE image.news_id= :id';
        $data = $this->read($query,$arr);
        return $data;
    }
    public function getAll(){
        $query = 'SELECT * FROM news JOIN image ON news.id = image.news_id;';
        $data = $this->read($query,[]);
        return $data;
    }

}
?>