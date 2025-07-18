<?php

namespace App\Controllers;


use App\Providers\Api_Manager;
use Dotenv\Dotenv;


header('Content-Type: application/json; charset=utf-8');
class ApiController{

    public function __construct(){
            $dotenv = Dotenv::createImmutable(__DIR__.'/../../');
        $dotenv->load();
    }

    public function index_rivals(){
     $api =   new Api_Manager('https://marvelrivalsapi.com/api/v1',[
            'x-api-key: '.$_ENV['KEY_API_RIVALS']
        ]);
        $response = $api->get('/heroes');

        echo json_encode($response);
    }
}
