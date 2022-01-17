<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Inzerat;
use App\Models\Photos;
use App\Models\Review;
use App\Models\Users;

class ProfileController extends AControllerRedirect
{
    public function index()
    {


        return $this->html(
            [
                'post' => 'test'
            ]);
    }



    public function login()
    {
        $login = $this->request()->getValue('login');
        $password = $this->request()->getValue('password');
        $password = md5($password);
        $logged = Auth::login($login,$password);

        if ($logged){
            $this->redirect('home');
        } else {
            $this->redirect('profile','loginForm',['error' => 'Nesprávne prihlasovacie údaje!']);
        }
    }


    public function register()
    {

        $newUser = new Users();

        $newUser->setLogin($this->request()->getValue('login'));
        $newUser->setFullname($this->request()->getValue('fullname'));
        $newUser->setEmail($this->request()->getValue('email'));
        $hash = $this->request()->getValue('password');
        $newUser->setPassword(md5($hash));

        $registered = Auth::register($this->request()->getValue('login'),$this->request()->getValue('email'));
        if ($registered == 3){
            $newUser->save();
            $this->redirect('profile','loginForm');
        } else if ($registered == 1){
            $this->redirect('profile','registrationForm',['error' => 'Uzivatel so zadanym loginom uz existuje!']);
        }  else if ($registered == 2){
            $this->redirect('profile','registrationForm',['error' => 'Uzivatel so zadanym emailom uz existuje!']);
        }
    }


    public function registrationForm()
    {
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function loginForm()
    {
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function myList()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        $inzeraty = Inzerat::getAll();
        $photos = Photos::getAll();

        return $this->html(
            [
                'inzeraty' => $inzeraty,
                'photos' => $photos,
                'error' => $this->request()->getValue('error')


            ]);
    }

    public function updateProfile()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        $users = Users::getAll();
        $userLogin = $this->request()->getValue('login');
        $userId = $this->request()->getValue('userId');
        return $this->html(
            [
                'users' => $users,
                'userId' => $userId,
                'login' => $userLogin,
                'error' => $this->request()->getValue('error')

            ]);
    }


    public function makeUpdateProfile()
    {
        if(!Auth::isLogged()){
            $this->redirect('home');
        }

        $users = Users::getAll();


        foreach ($users as $u) {
            if($u->getId() == $this->request()->getValue('id')){
                $u->setLogin($this->request()->getValue('login'));
                $u->setFullname($this->request()->getValue('fullname'));
                $u->setEmail($this->request()->getValue('email'));
                $upass = $this->request()->getValue('password');
                $u->setPassword(md5($upass));


                $registered = Auth::register2($this->request()->getValue('login'),$this->request()->getValue('email'),$this->request()->getValue('id'));
                if ($registered == 3){
                    $u->save();
                    $_SESSION["name"] = $u->getLogin();
                    $this->redirect('profile','settings');
                } else if ($registered == 1){
                    $this->redirect('profile','settings',['error' => 'Uzivatel so zadanym loginom uz existuje!']);
                }  else if ($registered == 2){
                    $this->redirect('profile','settings',['error' => 'Uzivatel so zadanym emailom uz existuje!']);
                }

            }
        }
    }


    public function settings()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        $users = Users::getAll();


        return $this->html(
            [
                'users' => $users,
                'error' => $this->request()->getValue('error')

            ]);
    }

    public function deleteProfile() {
        if(!Auth::isLogged()){
            $this->redirect('home');
        }
        $userId = $this->request()->getValue('id');
        $users = Users::getAll();
        $inzeraty = Inzerat::getAll();
        $reviews = Review::getAll();
        $photos = Photos::getAll();
        foreach ($users as $u) {
            if($userId == $u->getId())
            {
                foreach ($reviews as $r) {
                    if($userId == $r->getUserWriter())
                    {

                        $r->delete();
                    }
                }

                foreach ($inzeraty as $i) {
                    if($userId == $i->getUserId())
                    {
                        foreach ($photos as $p) {
                            if($i->getId() == $p->getInzeratId())
                            {

                                $p->delete();
                            }
                        }

                        $i->delete();
                    }
                }
                Auth::logout();
                $u->delete();
            }
        }
        $this->redirect('home');
    }

    public function logout()
    {
        Auth::logout();
        $this->redirect('home');
    }

}