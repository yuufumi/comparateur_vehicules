<?php 

abstract Class Database
{	
	public $db;
	public function db_connect()
	{

		try{
			$string = DB_TYPE .":host=".DB_HOST.";dbname=".DB_NAME.";";
			$this->db = new PDO($string,DB_USER,DB_PASS);
			
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function db_disconnect(){
		$this->db = null;
	}

	public function read($query,$data = [])
	{
		$this->db_connect();
		$stm = $this->db->prepare($query);

		if(count($data) == 0)
		{
			$stm = $this->db->query($query);
			$check = 0;
			if($stm){
				$check = 1;
			}
		}else{

			$check = $stm->execute($data);
		}

		if($check)
		{
			$data = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($data) && count($data) > 0)
			{
				return $data;
			}

			return false;
		}else
		{
			return false;
		}
	}

	public function write($query,$data = [])
	{

			$this->db_connect();
		$stm = $this->db->prepare($query);

		if(count($data) == 0)
		{
			$stm = $this->db->query($query);
			$check = 0;
			if($stm){
				$check = 1;
			}
		}else{

			$check = $stm->execute($data);
		}

		if($check)
		{
			return true;
		}else
		{
			return false;
		}
	}

	public abstract function insert($data); //inserts a row
    public abstract function delete($id); // deletes a row with a specific id
    public abstract function update($data); //updates a row
    public abstract function getById($id); //returns a row that has a specific id
    public abstract function getAll(); //returns all the rows

}