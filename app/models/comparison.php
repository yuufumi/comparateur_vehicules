<?php
class comparison extends Database{
    public function insert($data){
        $this->db_connect();
		if($data)
		{	
			print_r($data);
			$arr['id1'] = $data['id1'];
			$arr['id2'] = $data['id2'];
            $query = "SELECT * FROM comparaison c where vehicule1_id= :id1 and vehicule2_id= :id2 or vehicule1_id= :id2 and vehicule2_id= :id1";
            $data = $this->read($query,$arr);
            if($data){
                //update the count
                show($data);
                $arr2['id'] = $data[0]->id;
                $arr2['count'] = $data[0]->frequence + 1;
                $query = "UPDATE comparaison c SET frequence = :count WHERE id = :id";
                $updated = $this->write($query,$arr2);
                if(count($data)>1){
                    $arr2['id'] = $data[1]->id;
                    $query = "DELETE FROM comparaison c where id= :id";
                    $updated = $this->write($query,$arr2);
                }
            }else{
                //insert with count of 1
                $query = "insert into comparaison (vehicule1_id,vehicule2_id,frequence) values (:id1,:id2,1)";
                $data = $this->write($query,$arr);
            }

		}else{
            echo "no cars to save";
		}
		$this->db_disconnect();
    }
    public function delete($id){}
    public function update($data){}
    public function getAll(){
        $query = "SELECT
        c.id,
        vehicule1.id AS first_car_id,
        vehicule1.nom AS first_car_name,
        vehicule2.id AS second_car_id,
        vehicule2.nom AS second_car_name,
        c.frequence
        FROM
        comparaison c
        JOIN
        vehicule vehicule1 ON c.vehicule1_id = vehicule1.id
        JOIN
        vehicule vehicule2 ON c.vehicule2_id = vehicule2.id
        ORDER BY c.frequence DESC";
        $data = $this->read($query);
        return $data;
    }
    public function count($car1, $car2){
        $arr['id1'] = $car1;
        $arr['id2'] = $car2;
        $query = "SELECT COUNT(*) AS frequence FROM comparaison c WHERE c.vehicule1_id = :id1 AND c.vehicule2_id = :id2; limit 1";
        $data = $this->read($query,$arr);
        return $data;
    }



}


?>