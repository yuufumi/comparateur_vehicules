<?php
class comparison extends Database{
    public function insert($data){
        $this->db_connect();
		if($data)
		{	
			print_r($data);
			$arr['id1'] = $data['id1'];
			$arr['id2'] = $data['id2'];
			$query = "insert into comparaison (vehicule1_id,vehicule2_id) values (:id1,:id2)";
			$data = $this->write($query,$arr);

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
        vehicule2.nom AS second_car_name
        FROM
        comparaison c
        JOIN
        vehicule vehicule1 ON c.vehicule1_id = vehicule1.id
        JOIN
        vehicule vehicule2 ON c.vehicule2_id = vehicule2.id;
        ";
        $data = $this->read($query);
        return $data;
    }



}


?>