<?php 

<<<<<<< HEAD
namespace App\Models;

use App\Database\DbClass;
class UserModel {
    
    private $dbh;
    public function Read(){
        $this->dbh = new DbClass();
        $this->dbh->query('SELECT * FROM usuario');
        return $this->dbh->resultset();
=======
use App\Database\DbClass;
class UserModel extends Db{
 
    public function Read(){
        $this->query('SELECT * FROM usuario');
        return $this->resultset();
>>>>>>> da9e0e4749b49216702581b6189b4e8130ac0cfc
    }


    public function Insert(){
        
    }
}

