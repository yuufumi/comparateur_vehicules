<?php
class comment extends Database{


    public function updateStatus($post){
        $query = "UPDATE avis SET statut = :statut WHERE id = :avis";
        
        $check = $this->write($query,$post);
    }
    public function getAll(){
        $query = "SELECT avis.id as avis_id, utilisateur_id, user.nom as user_nom,prenom, user.statut as statut_user, vehicule.nom as vehicule_nom, commentaire, note, avis.statut as statut_avis from avis join user on user.id = avis.utilisateur_id join vehicule on vehicule.id = avis.vehicule_id ORDER BY statut_user ASC";
        $data = $this->read($query);
        return $data;
    }

    public function getUserAvis($userId){
        $arr['id'] = $userId; 
        $query = "SELECT avis.id as avis_id, user.id as user_id, avis.commentaire, avis.note, avis.statut FROM avis JOIN user ON user.id = avis.utilisateur_id WHERE avis.utilisateur_id = :id ORDER BY avis.note DESC";
        $data = $this->read($query,$arr);
        return $data;
    }

    public function getMarqueAvis($marqueId){
        $arr['id'] = $marqueId; 
        $query = "SELECT avis.id as avis_id, user.id as user_id, avis.commentaire, avis.note, avis.statut,user.nom, user.prenom  FROM avis JOIN user ON user.id = avis.utilisateur_id WHERE avis.marque_id = :id AND avis.statut = 'approved' ORDER BY avis.note DESC limit 3";
        $data = $this->read($query,$arr);
        return $data;
    }

    public function getVehiculeAvis($VehiculeId){
        $arr['id'] = $VehiculeId; 
        $query = "SELECT avis.id as avis_id, user.id as user_id, avis.commentaire, avis.note, avis.statut,user.nom, user.prenom  FROM avis JOIN user ON user.id = avis.utilisateur_id WHERE avis.vehicule_id = :id AND avis.statut = 'approved' ORDER BY avis.note DESC limit 3";
        $data = $this->read($query,$arr);
        return $data;
    }
    public function insertAvisMarque($avis){
        $arr['user'] = $avis['user'];
        $arr['marque'] = $avis['marque'];
        $arr['avis'] = $avis['avis'];
        $arr['note'] = $avis['note'];

        $query = "INSERT into avis (utilisateur_id,marque_id,commentaire,note) values (:user, :marque, :avis, :note)";
        $inserted = $this->write($query,$avis);
        return $inserted;

    }

    public function insertAvisVehicule($avis){
        $query = "INSERT into avis (utilisateur_id,vehicule_id,commentaire,note) values (:user, :vehicule, :avis, :note)";
        $inserted = $this->write($query,$avis);
        return $inserted;

    }
    //public function validateAvis($id){}

    //public function blockAvis($id){}

    //public function deleteAvis($id){}

    //public function getByIdAvis($id){}
}
?>