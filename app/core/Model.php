<?php 
abstract class Model extends Database{
    protected $db;
    function __construct()
    {
        $this->db=new Database();
    }
    abstract function tableFill();
    abstract function fieldFill();
    public function getAll(){
        $tableName=$this->tableFill();
        $fieldSelect=$this->fieldFill();
        if(empty($fieldSelect)){
            $fieldSelect='*';
        }
        $sql="select $fieldSelect from $tableName";
        $query=$this->db->query($sql);
        if(!empty($query)){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
    public function first($id) {
        $tableName=$this->tableFill();
        $fieldSelect=$this->fieldFill();
        if(empty($fieldSelect)){
            $fieldSelect='*';
        }
        $sql="select $fieldSelect from $tableName where id =$id";
        $query=$this->db->query($sql);
        if(!empty($query)){
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
   
    
}