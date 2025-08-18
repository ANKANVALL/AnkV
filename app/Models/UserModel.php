<?php 
require_once __DIR__.'/../database/DbClass.php';

use App\Database\DbClass;
class UserModel extends Db{
 
    public function Read(){
        $this->query('SELECT * FROM usuario');
        return $this->resultset();
    }


    public function Insert(){
        $this->query();
        return ;
    }

    public function Delete(){
    $this->query();
    return ;
    }
}

