<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Inzerat;
use App\Models\Photos;
use App\Models\Review;
use App\Models\Users;

class InzeratController extends AControllerRedirect
{
    public function index()
    {


        return $this->html(
            [
                'post' => 'test'
            ]);
    }



    public function inzeratForm()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html([ 'error' => $this->request()->getValue('error')]);
    }


    public function soloInzerat(){
        $inzeraty = Inzerat::getAll();
        $users = Users::getAll();
        $photos = Photos::getAll();


        $inzeratId = $this->request()->getValue('inzeratId');
        return $this->html(
            [
                'users' => $users,
                'inzeraty' => $inzeraty,
                'inzeratId' => $inzeratId,
                'photos' => $photos
            ]);
    }


    public function upload()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $newInzerat = new Inzerat();

        $newInzerat->setCategory($this->request()->getValue('category'));
        $newInzerat->setTitle($this->request()->getValue('title'));
        $newInzerat->setText($this->request()->getValue('text'));
        $newInzerat->setAddress($this->request()->getValue('address'));
        $newInzerat->setPhoneNumber($this->request()->getValue('phone_number'));
        $newInzerat->setPrice($this->request()->getValue('price'));
        $newInzerat->setUserId($_SESSION["id"]);
        $newInzerat->setDate(date('d.m.Y   H:i:s',strtotime('+1 hour')));

        $registered = Auth::inzeratRegister($this->request()->getValue('title'));
        if ($registered == 2){
            $newInzerat->save();
            $this->redirect('inzerat','photosForm');
        } else if ($registered == 1){
            $this->redirect('inzerat','inzeratForm',['error' => 'Inzerát so zadaným nádpisom už existuje!']);
        }



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
                'id' => $inzeratId,
                'error' => $this->request()->getValue('error')


            ]);
    }

    public function photosForm()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        $inzeraty = Inzerat::getAll();


        return $this->html(
            [
                'inzeraty' => $inzeraty,

            ]);
    }

    public function uploadPhoto()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        $allowed = array('png', 'jpg');
        $newPhoto = new Photos();
        if (isset($_FILES['file1'])) {
            if ($_FILES["file1"]["error"] == UPLOAD_ERR_OK) {
                $name1 = date('Y-m-d-H-i-s_') . $_FILES['file1']['name'];
                move_uploaded_file($_FILES['file1']['tmp_name'], Configuration::UPLOAD_DIR . "$name1");
                $newPhoto->setInzeratId($this->request()->getValue('inzeratId'));
                $newPhoto->setImage($name1);

                $newPhoto->save();
            }
        }
        if (isset($_FILES['file2'])) {
            if ($_FILES["file2"]["error"] == UPLOAD_ERR_OK) {
                $name2 = date('Y-m-d-H-i-s_') . $_FILES['file2']['name'];
                move_uploaded_file($_FILES['file2']['tmp_name'], Configuration::UPLOAD_DIR . "$name2");
                $newPhoto->setInzeratId($this->request()->getValue('inzeratId'));
                $newPhoto->setImage($name2);

                $newPhoto->save();
            }
        }
        if (isset($_FILES['file3'])) {
            if ($_FILES["file3"]["error"] == UPLOAD_ERR_OK) {
                $name3 = date('Y-m-d-H-i-s_') . $_FILES['file3']['name'];
                move_uploaded_file($_FILES['file3']['tmp_name'], Configuration::UPLOAD_DIR . "$name3");
                $newPhoto->setInzeratId($this->request()->getValue('inzeratId'));
                $newPhoto->setImage($name3);

                $newPhoto->save();
            }
        }

        $this->redirect('profile','myList');
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

        $this->redirect('profile','myList');
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


                $registered = Auth::inzeratUpdate($this->request()->getValue('title'),$this->request()->getValue('id'));
                if ($registered == 2){
                    $inzerat->setUserId($_SESSION["id"]);
                    $inzerat->save();
                    $this->redirect('profile','myList');
                } else if ($registered == 1){
                    $this->redirect('profile','myList',['error' => 'Inzerát so zadaným nádpisom už existuje!']);
                }



            }
        }



    }



}