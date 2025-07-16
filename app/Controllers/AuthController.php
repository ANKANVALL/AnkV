<?php 

namespace App\Controllers;

use App\Providers\Auth;
use App\Views\View;


class AuthController{
    public function showlogin(){
        $view = new View('public');
        echo $view->Render(['page' => 'login']);
    }

    public function login(){
        $usuarios = [
            'admin' => ['password' => '1234', 'role' => 'admin'],
            'user' => ['password' => '1234', 'role' => 'user']
        ];
        
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        

        if(isset($usuarios[$username])&&$usuarios[$username]['password']=== $password){
            Auth::login([ 
                'username' => $username,
                'role' => $usuarios[$username]['role']
            ]);
            header('Location: /admin/dashboard');
            exit;
        }
        echo 'credenciales Incorrectas';
    }

    public function logout(){
        Auth::logout();
        header('Location: /');
        exit;
    }
}