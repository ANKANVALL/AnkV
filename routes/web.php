<?php 



return [
    //Users
    '/' => ['controller' => 'HomeController', 'method' => 'index'],
    '/services' => ['controller' => 'HomeController', 'method' => 'services'],
    '/api_test' => ['controller' => 'HomeController', 'method' => 'api_test'],
    '/api_rivals' => ['controller' => 'HomeController', 'method' => 'api_rivals'],

    //apis
    '/rivals' => ['controller' => 'ApiController', 'method' => 'index_rivals'],
    

    //auth
    '/login' => ['controller' => 'AuthController', 'method' => 'showLogin'],
    
    '/logout' => ['controller' => 'AuthController', 'method' => 'logout'],
    
    '/admin/dashboard' => ['controller' => 'AdminController', 'method' => 'dashboard'],
];
