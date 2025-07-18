<?php

// app/Controllers/HomeController.php
namespace App\Controllers;

use App\Views\View;
use App\Providers\Api_Manager;
use App\Providers\Auth;
use Dotenv\Dotenv;
class HomeController extends Auth {

    private $auth ;

    private $account;
    private $data = [
        'body' => 'En este es un objeto dentro de una clase ',
        'footer' => 'Chainsaw',
        
    ];
    public function __construct(){
        $dotenv = Dotenv::createImmutable(__DIR__.'/../../');
        $dotenv->load();

        $this->auth = new Auth();
        $this->account = $this->auth->check() ? $_SESSION['user'] : 'invitado';
        $_SESSION['active_user'] = $this->account;
    }

    public function index() {
         $view = new View('public');
      
          $html = $view->Render(
        ['page' => 'index'],[
            'user' => 'LAIN',
            'rol' => 'adomin',
            'account' => '',
            'object' => $this->data
        ]
        );
        echo $html;
    }

    public function logintest() {
         $view = new View('public');
      
          $html = $view->Render(
        ['page' => 'index'],[
        ]
        );
        echo $html;
    }

    public function services(){
        $view = new View('public');
        $html = $view->Render(
            ['page' => 'servicios'],
            []
        );
        echo $html;
    }


    public function api_test(){
        $view = new View('public');
    
        $Apidata = new Api_Manager('https://marvelrivalsapi.com/api/v1',[
            'x-api-key:'
        ]);
        
   
        $response = $Apidata->get('/heroes/hero/' . urlencode('venom'));

        $html = $view->Render(
            ['page' => 'api_test'],
            [
                'apidata' => $response
            ]
        );
        echo $html;
    }

    public function api_rivals(){
        $view = new View('public');
          
        $html = $view->Render(
            ['page' => 'api_rivals'],
            []
        );
        echo $html;
    }
}

