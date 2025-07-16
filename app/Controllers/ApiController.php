<?php
namespace App\Controllers;

use App\Providers\Api_Manager;
header('Content-Type: application/json; charset=utf-8');
class ApiController{

    public function index_rivals(){
     $api =   new Api_Manager('https://marvelrivalsapi.com/api/v1',[
            'x-api-key: '
        ]);
        $response = $api->get('/heroes');

        echo json_encode($response);
    }
}
