<?php 


namespace App\Models;

use App\Database\DbClass;
class UserModel {
    
    private $dbh;
    public function Read(){
        $this->dbh = new DbClass();
        $this->dbh->query('SELECT * FROM usuario');
        return $this->dbh->resultset();
    }
}