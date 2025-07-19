<?php 
require_once __DIR__.'/../database/DbClass.php';

use App\Database\DbClass;
class UserModel extends Db{
 
    public function Read(){
        //query para usuarios
        $this->query('SELECT * FROM usuario');
        return $this->resultset();
    }

}
