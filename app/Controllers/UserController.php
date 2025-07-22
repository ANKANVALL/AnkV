<<<<<<< HEAD
<?php 

namespace App\Controllers;

use App\Models\UserModel;
use App\Views\View;
use App\Providers\Auth;

class UserController extends Auth{

    private $db;
    private $auth ;

    private $account;
    public function __construct(){

        $this->auth = new Auth();
        $this->account = $this->auth->check() ? $_SESSION['user'] : 'invitado';
        $_SESSION['active_user'] = $this->account;
    }
    public function index_v(){
        
        $this->db = new UserModel();
        $view = new View('public');
      $userdata = $this->db->Read();
     $html =  $view->Render(['page' => 'User'],
       [
        'frontdata' => $userdata 
       ]  ) ;
       echo $html;
        
    }
}
=======
<?php 
>>>>>>> da9e0e4749b49216702581b6189b4e8130ac0cfc
