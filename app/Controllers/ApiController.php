<?php
namespace App\Controllers;

use App\Providers\Api_Manager;
header('Content-Type: application/json; charset=utf-8');
class ApiController{

    public function index_rivals(){
     $api =   new Api_Manager('https://marvelrivalsapi.com/api/v1',[
            'x-api-key: 91b4b2320eb03e8acdf3cdf9081a366b72a41b1081a30540a438dfd76190c4d0'
        ]);
        $response = $api->get('/heroes');

        echo json_encode($response);
    }
}