<?php 
require_once __DIR__.'/../database/DbClass.php';

class UserModel extends Db{
 
    public function Read(){
        $this->query('SELECT * FROM usuario');
        return $this->resultset();
    }

}
