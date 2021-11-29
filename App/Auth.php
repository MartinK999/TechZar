<?php

namespace App;

use App\Models\Users;

class Auth
{


    public static function login($login, $password)
    {
        $users = Users::getAll();

        foreach ($users as $u) {
            if ($login == $u->getLogin()) {
                if ($password == $u->getPassword()) {
                    $_SESSION["name"] = $login;
                    return true;
                } else {
                    return false;
                }
            }
        }

        return false;
    }

    public static function logout()
    {
        unset($_SESSION['name']);
        session_destroy();
    }

    public static function register()
    {
        
    }

    public static function isLogged()
    {
        return isset($_SESSION['name']);
    }

    public static function getName()
    {
        return (Auth::isLogged() ? $_SESSION['name'] : "");
    }
}