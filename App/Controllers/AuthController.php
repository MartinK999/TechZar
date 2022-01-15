<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\Responses\Response;
use App\Models\Inzerat;
use App\Models\Photos;
use App\Models\Review;
use App\Models\users;

class AuthController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function loginForm()
    {
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function registrationForm()
    {
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }
    public function updateInzerat()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        $inzeraty = Inzerat::getAll();
        $inzeratId = $this->request()->getValue('id');


        return $this->html(
            [
                'inzeraty' => $inzeraty,
                'id' => $inzeratId


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
                'login' => $userLogin
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
                $u->setPassword($this->request()->getValue('password'));


                $u->save();
                $_SESSION["name"] = $u->getLogin();
            }

        }

        $this->redirect('auth','settings');

    }

    public function settings()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        $users = Users::getAll();


        return $this->html(
            [
                'users' => $users

            ]);
    }


    public function deleteInzerat() {

        if(!Auth::isLogged()){
            $this->redirect('home');
        }
        $inzeratId = $this->request()->getValue('id');
        $inzeraty = Inzerat::getAll();
        $photos = Photos::getAll();
        foreach ($inzeraty as $i) {
        if($inzeratId == $i->getId())
            {
                foreach ($photos as $p) {
                    if($inzeratId == $p->getInzeratId())
                    {
                        $p->delete();
                    }
                }


                $i->delete();
            }
        }

        $this->redirect('home','myList');
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



    public function login()
    {
        $login = $this->request()->getValue('login');
        $password = $this->request()->getValue('password');

        $logged = Auth::login($login,$password);

        if ($logged){
            $this->redirect('home');
        } else {
            $this->redirect('auth','loginForm',['error' => 'Nesprávne prihlasovacie údaje!']);
        }
    }


    public function register()
    {

        $newUser = new Users();

        $newUser->setLogin($this->request()->getValue('login'));
        $newUser->setFullname($this->request()->getValue('fullname'));
        $newUser->setEmail($this->request()->getValue('email'));
        $newUser->setPassword($this->request()->getValue('password'));

        $registered = Auth::register($this->request()->getValue('login'),$this->request()->getValue('email'));
        if ($registered == 3){
            $newUser->save();
            $this->redirect('auth','loginForm');
        } else if ($registered == 1){
            $this->redirect('auth','registrationForm',['error' => 'Uzivatel so zadanym loginom uz existuje!']);
        }  else if ($registered == 2){
            $this->redirect('auth','registrationForm',['error' => 'Uzivatel so zadanym emailom uz existuje!']);
        }
    }

    public function update()
    {
        if(!Auth::isLogged()){
            $this->redirect('home');
        }

        $inzeraty = Inzerat::getAll();


        foreach ($inzeraty as $inzerat) {
            if($inzerat->getId() == $this->request()->getValue('id')){

                $inzerat->setCategory($this->request()->getValue('category'));
                $inzerat->setTitle($this->request()->getValue('title'));
                $inzerat->setText($this->request()->getValue('text'));
                $inzerat->setAddress($this->request()->getValue('address'));
                $inzerat->setPrice($this->request()->getValue('price'));


                $inzerat->setUserId($_SESSION["id"]);
                $inzerat->save();

            }
        }

        $this->redirect('home','myList');

    }

    public function logout()
    {
        Auth::logout();
        $this->redirect('home');
    }
}