<?php
class contacts extends Database{
    public function getContact(){
        $query = "select * from contact";
        $data = $this->read($query);
        return $data;
    }
}
?>