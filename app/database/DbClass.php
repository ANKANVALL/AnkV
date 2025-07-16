<?php 
namespace App\Database;

define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB_NAME','prueba');
 class DbClass{
     private $hostname = HOST;
     private $dbname = DB_NAME;
    private $User = USER;
    private $Password = PASS;
    private $charset = 'utf8mb4';

    private $dbh;
    private $error;
    private $pdo = null;
    private $stmt = null;
   
    public function __construct(){
       $dsn = "mysql:host={$this->hostname};dbname={$this->dbname};charset={$this->charset}";
        $option = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbh = new PDO($dsn,$this->User,$this->Password,$option);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            error_log("DB Error: " . $this->error); // loguea en vez de mostrar
        }
    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    public function execute(){
        return $this->stmt->execute();
    }



    public function resultset(){
        $this->execute();
        return  $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function resultsingle(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function BoolRes():bool{
        $this->execute();
        return (bool) $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function bind($param, $value, $type = null) {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }
        public function debugQuery(){
                return $this->stmt->queryString;
            }
            public function closed(){
                $this->dbh = null;
            }

                 public function rowCount(){
            return $this->stmt->rowCount();
        }

        public function lastInsertId(){
            return $this->dbh->lastInsertId();
        }
    public function __destruct(){
        $this->stmt = null;
        $this->dbh = null;
    }

       


 } 