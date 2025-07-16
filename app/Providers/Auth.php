<?php 

namespace App\Providers;

    class Auth{
        public static function login($user){
            $_SESSION['user'] = $user;
        }

        public static function user(){
            return $_SESSION['user'] ?? null;
        }

        public static function check():bool{
            return isset($_SESSION['user']);
        }

        public static function logout(){
            unset($_SESSION['user']);
        }
        public static function VerifiedAdmin():bool{
            return self::check() && $_SESSION['user']['role'] === 'admin';
        }

    }
