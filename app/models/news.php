<?php
Class news extends Database{
    public function insert($data){}
    public function delete($id){}
    public function update($data){}
    public function getById($id){}
    public function getAll(){
        $query = 'SELECT * FROM news JOIN image ON news.id = image.news_id;';
        $data = $this->read($query,[]);
        return $data;
    }

}
?>