<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\Responses\Response;
use App\Models\Inzerat;
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

        return $this->html(
            [
                'users' => $users,
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
            if($u->getLogin() == $this->request()->getValue('login')){

                $u->setFullname($this->request()->getValue('fullname'));
                $u->setEmail($this->request()->getValue('email'));
                $u->setPassword($this->request()->getValue('password'));


                $u->save();

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
        foreach ($inzeraty as $i) {
        if($inzeratId == $i->getId())
        {
                $i->delete();
            }
        }

        $this->redirect('home','myList');
    }

    public function deleteProfile() {
        if(!Auth::isLogged()){
            $this->redirect('home');
        }
        $userLogin = $this->request()->getValue('login');
        $users = Users::getAll();
        $inzeraty = Inzerat::getAll();
        $reviews = Review::getAll();
        foreach ($users as $u) {
            if($userLogin == $u->getLogin())
            {
                foreach ($reviews as $r) {
                    if($userLogin == $r->getUserWriter())
                    {

                        $r->delete();
                    }
                }

                foreach ($inzeraty as $i) {
                    if($userLogin == $i->getLoginFk())
                    {

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

                if (isset($_FILES['file'])) {
                    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                        $name = date('Y-m-d-H-i-s_') . $_FILES['file']['name'];
                        move_uploaded_file($_FILES['file']['tmp_name'], Configuration::UPLOAD_DIR . "$name");

                        $inzerat->setImage($name);
                    }
                }
                 if ($name == "") {
                     $inzerat->setImage($inzerat->getImage());
                 }
                $inzerat->setLoginfk($_SESSION["name"]);
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