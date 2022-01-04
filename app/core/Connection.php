<?php 
class Connection{
    private static $instance=null,$conn=null;
    private function __construct($config)
    {
        try{
            $dsn='mysql:dbname='.$config['db'].';host='.$config['host'];
            
            $con=new PDO($dsn,$config['user']);
            self::$conn=$con;
        }
        catch(Exception $exception){
            $mess=$exception->getMessage();
            die($mess);
        }
    } 
    public static function getInstance($config){
        if(self::$instance==null){
            $connection=new Connection($config);
            self::$instance=self::$conn;
        }
        return self::$instance;
    }
}