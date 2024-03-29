<?php
Class vehicule extends Database{

    public function insertFavoris($data){
        $arr['user'] = $data['user'];
        $arr['car'] = $data['car'];
        $query = 'SELECT * from favoris WHERE user_id= :user AND vehicule_id= :car;';
        $data = $this->read($query,$arr);
        if(!$data){
            $query = 'INSERT IGNORE INTO favoris (user_id, vehicule_id) VALUES (:user, :car);';
            $check = $this->write($query,$arr);
            return $check;
        }else{
            return true;
        }
    }
    public function insert($data){}
    public function delete($id){}
    public function update($data){}
    public function getById($id){
        $arr['id'] = $id;
        $query = 'SELECT vehicule.id as vehicule_id, marque.id as marque_id,modele.id as modele_id, version.id as version_id, vehicule.nom as vehicule_nom, marque.nom as marque_nom, modele.modele_nom , version.version, version.annee, vehicule.prix, caracteristique.name as feature_name, vehicule_caracteristique.Value, image.lien FROM vehicule LEFT JOIN vehicule_caracteristique ON vehicule.id=vehicule_caracteristique.vehicule_id LEFT JOIN caracteristique ON caracteristique.id=vehicule_caracteristique.feature_id JOIN image ON vehicule.id = image.vehicule_id JOIN marque ON marque.id= vehicule.marque_id JOIN modele ON vehicule.modele_id=modele.id JOIN version ON vehicule.version_id=version.id WHERE vehicule.id = :id';
        
        $data = $this->read($query,$arr);
        return $data;
    }

    public function getByMarque($marqueid){
        $arr['id'] = $marqueid;
        $query = 'SELECT vehicule.id as vehicule_id, image.lien, marque.id as marque_id, vehicule.nom as vehicule_nom FROM vehicule JOIN image ON vehicule.id = image.vehicule_id JOIN marque ON marque.id= vehicule.marque_id WHERE vehicule.marque_id= :id ;';
        $data = $this->read($query,$arr);
        return $data;

    }
    public function getModeles($marque){
        $arr['marque'] = $marque;
        $query = "SELECT * FROM modele WHERE modele.marque_id= :marque;";
        $data = $this->read($query,$arr);
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
    public function getAll($params){
        if(!empty($params)){
            $string = implode(",", $params);
            $query = 'SELECT '.$string.' FROM vehicule JOIN image ON vehicule.id = image.vehicule_id JOIN marque ON marque.id= vehicule.marque_id JOIN modele ON vehicule.modele_id=modele.id JOIN version ON vehicule.version_id=version.id ';            
        }else{
            $query = 'SELECT * FROM vehicule LEFT JOIN vehicule_caracteristique ON vehicule.id=vehicule_caracteristique.vehicule_id LEFT JOIN caracteristique ON caracteristique.id=vehicule_caracteristique.feature_id JOIN image ON vehicule.id = image.vehicule_id JOIN marque ON marque.id= vehicule.marque_id JOIN modele ON vehicule.modele_id=modele.id JOIN version ON vehicule.version_id=version.id ';
        }
        $data = $this->read($query);
        return $data;
    }

    public function getByInfo($arr){
        $query = 'SELECT vehicule.id as vehicule_id,caracteristique.id as feature_id, caracteristique.name as feature_name,vehicule_caracteristique.Value as feature_value, image.lien, marque.nom as marque_nom,vehicule.prix, marque.id as marque_id, modele.modele_nom, version.version as version_nom, version.annee as annee_nom, vehicule.version_id, vehicule.modele_id, vehicule.nom as vehicule_nom FROM vehicule LEFT JOIN vehicule_caracteristique ON vehicule.id=vehicule_caracteristique.vehicule_id LEFT JOIN caracteristique ON caracteristique.id=vehicule_caracteristique.feature_id JOIN image ON vehicule.id = image.vehicule_id JOIN marque ON marque.id= vehicule.marque_id JOIN modele on vehicule.modele_id=modele.id JOIN version on version.id=vehicule.version_id WHERE vehicule.marque_id= :marque AND vehicule.modele_id= :modele AND vehicule.version_id= :annee ;';
        $data = $this->read($query,$arr);
        return $data;        
    }
}
?>