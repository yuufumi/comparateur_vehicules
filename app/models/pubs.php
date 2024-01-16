<?php
Class pubs extends Database{
    public function insert($data){}
    public function delete($id){}
    public function updateNews($data){
        $arr['id'] = $data['image_id'];
        if(!$data['image']){
        $arr['lien'] = $data['image'];
        $query = "UPDATE image SET image.lien = :lien WHERE image.id = :id";
        $check = $this->write($query,$arr);
        }
        $arr2['id'] = $data['id'];
        $arr2['titre'] = $data['titre'];
        $arr2['contenu'] = $data['contenu'];
        $query = "UPDATE news SET news.titre = :titre, news.contenu = :contenu WHERE news.id = :id";
        $check = $this->write($query,$arr2);
    }

    public function addNews($data){
        
        $arr['titre'] = $data['titre'];
        $arr['contenu'] = $data['contenu'];
        $query = "INSERT INTO news (titre,contenu) values (:titre, :contenu)";
        $check = $this->write($query,$arr);
        if(!$data['lien']){
            $query = 'SELECT id FROM news WHERE  news.titre= :titre AND news.contenu= :contenu limit 1';
            $iid = $this->write($query,$arr);
            $arr2['id'] = $iid;
            $arr2['lien'] = $data['lien'];
            $query = "INSERT INTO image (lien, news_id) values (:lien,:id)";
            $check = $this->write($query,$arr2);
        }
    }
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