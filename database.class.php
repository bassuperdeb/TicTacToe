<?php

        define("DB_host","");
        define("DB_user","");
        define("DB_pass","");
        define("DB_name","");
        

class Database {
    protected $con;
    protected $dsn;
    protected $stmt;


    protected $host   = DB_host;
    protected $dbname = DB_name;
    protected $user   = DB_user;
    protected $pass   = DB_pass;

    public function __construct(){
        // set DSN
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
        // set Option
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // PDO Instance
        try {              // build-in
            $this->con = new PDO($dsn,$this->user,$this->pass,$options);
            //echo "Yessssss";
        }
        catch(PDOException $e){
            $this->error = $e->getMessage();
            echoError();
        }
    }
    public function prepare($sql){
        $this->stmt = $this->con->prepare($sql);
    }
    public function bind($param,$value,$option = NULL){
        if($option === 'str'){
            $option = PDO::PARAM_STR; 
        }
        else if ($option === 'int'){
            $option = PDO::PARAM_INT;
        }else{ $option = PDO::PARAM_STR;}
        $this->stmt->bindValue($param,$value,$option);
    }
    public function fetchObj(){
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function execute(){
        $this->stmt->execute();
    }

    public function insertLog($log,$size,$winner){
        $sql = "insert into log (log,size,winner) values (:log,:size,:winner)";
        $this->prepare($sql);
        $this->bind(':log',$log,'str');
        $this->bind(':size',$size,'str');
        $this->bind(':winner',$winner,'str');
        $this->execute();
        return true;
    }

}
?>