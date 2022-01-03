<?php 
class Connection{
    private static $instance=null;
    private function __construct($config)
    {
        try{
            $dsn='mysql:dbname='.$config['db'].';host='.$config['host'];
            $options=[
                PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAME utf8',
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
            ];
            $conn=new PDO($dsn,$config['user'],$config['pass'],$options);

        }
        catch(Exception $exception){
            $mess=$exception->getMessage();
            die($mess);
        }
    } 
    public static function getInstance($config){
        if(self::$instance==null){
            self::$instance=new Connection($config);
        }
        return self::$instance;
    }
}