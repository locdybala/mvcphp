<?php
class UserModel extends Model
{
    private $table = 'users';

    function tableFill()
    {
        return 'users';
    }
    function fieldFill(){
        return '*';
    }
    public function getList()
    {
        $data=$this->getAll();
        return $data;
    }
    public function create($data){
        $sql = sprintf("INSERT INTO $this->table(first_name,last_name) VALUES ('%s', '%s')", $data['first_name'], $data['last_name']);
        $result = $this->db->query($sql);
        return $result;
    }
    public function edit($id){
        $data=$this->first($id);
        return $data;
    }
    public function update($data,$id)
    {
        $sql = sprintf("UPDATE users SET first_name = '%s', last_name = '%s' WHERE id='%s'", $data['first_name'], $data['last_name'], $id);
        
        $result = $this->db->query($sql);
        return $result;
    }
    public function destroy($id){
        $sql = sprintf("DELETE FROM users WHERE id = %d", $id);
        $result = $this->db->exec($sql);
        return $result;
    }
}