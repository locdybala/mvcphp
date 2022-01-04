<?php
class UserModel extends Model{
    protected $table='users';
   
    public function getList(){
        $data=$this->db->query("select * from $this->table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}