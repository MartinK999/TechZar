<?php

namespace App;

use App\Models\Inzerat;
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
                    $id = $u->getId();
                    $_SESSION["id"] = $id;
                    return true;
                } else {
                    return false;
                }
            }
        }

        return false;
    }

    public static function register($login,$email)
    {
        $users = Users::getAll();

        foreach ($users as $u) {
            if ($login == $u->getLogin()) {
                return 1;
            }

            if ($email == $u->getEmail()) {
                return 2;
            }

        }

        return 3;
    }

    public static function register2($login,$email,$id)
    {
        $users = Users::getAll();


        foreach ($users as $u) {
            if ($login == $u->getLogin() && $login != $_SESSION["name"]) {
                return 1;
            }


            if ($id != $u->getId()) {

                if ($email == $u->getEmail()) {
                        return 2;
                }
            }



        }

        return 3;
    }

    public static function inzeratUpdate($title,$id)
    {
        $inzeraty = Inzerat::getAll();


        foreach ($inzeraty as $i) {

            if ($id != $i->getId()) {
                if ($title == $i->getTitle()) {
                    return 1;
                }
            }
        }

        return 2;
    }

    public static function inzeratRegister($title)
    {
        $inzeraty = Inzerat::getAll();


        foreach ($inzeraty as $i) {
            if ($title == $i->getTitle()) {
                return 1;
            }

        }

        return 2;
    }



    public static function logout()
    {
        unset($_SESSION['name']);
        unset($_SESSION['id']);
        session_destroy();
    }


    public static function isLogged()
    {
        return isset($_SESSION['name']);
    }

    public static function getName()
    {
        return (Auth::isLogged() ? $_SESSION['name'] : "");
    }

    public static function getUserId()
    {
        return (Auth::isLogged() ? $_SESSION['id'] : "");
    }
}