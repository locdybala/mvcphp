<?php
class Database
{
    private $conn;
    function __construct()
    {
        global $db_config;
        $this->conn = Connection::getInstance($db_config);
    }
    // function insert($table, $data)
    // {
    //     if (!empty($data)) {
    //         $fieldStr = '';
    //         $valueStr = '';
    //         foreach ($data as $key => $value) {
    //             $fieldStr = $key . ',';
    //             $valueStr = "'" . $value . "'";
    //         }
    //         $valueStr = rtrim($fieldStr, ',');
    //         $valueStr = rtrim($valueStr, ',');
    //         $sql = "insert into $table($valueStr) values ($valueStr)";
    //         $status = $this->query($sql);
    //         if ($status) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
    // function update($table, $data, $condition = '')
    // {
    //     if (!empty($data)) {
    //         $updateStr = '';
    //         foreach ($data as $key => $value) {
    //             $updateStr .= "$key='$value',";
    //         }
    //         $updateStr = rtrim($updateStr, ',');
    //         if (!empty($condition)) {
    //             $sql = "update $table set $updateStr WHERE $condition";
    //         } else {
    //             $sql = "update $table set $updateStr ";
    //         }
    //         $status = $this->query($sql);
    //         if ($status) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
    // function delete($table, $condition = '')
    // {
    //     if (!empty($condition)) {
    //         $sql = 'DELETE FROM '.$table. ' where ' . $condition;
           
    //     } else {
    //         $sql = 'DELETE FROM' . $table;
    //     }
    //     $status = $this->query($sql);
    //     if ($status) {
    //         return true;
    //     }
        

    //     return false;
    // }
    function exec($sql){
        $statement=$this->conn->exec($sql);
        return $statement;
    }
    function query($sql){
        $statement=$this->conn->prepare($sql);
        $statement->execute();
        return $statement;
    }

}
