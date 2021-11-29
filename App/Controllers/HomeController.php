<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Inzerat;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerRedirect
{

    public function index()
    {


        return $this->html(
            [
                'post' => 'test'
            ]);
    }

    public function upload()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        if (isset($_FILES['file'])) {
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $name = date('Y-m-d-H-i-s_') . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], Configuration::UPLOAD_DIR . "$name");
                $newInzerat = new Inzerat();
                $newInzerat->setImage($name);
                $newInzerat->setCategory($this->request()->getValue('category'));
                $newInzerat->setTitle($this->request()->getValue('title'));
                $newInzerat->setText($this->request()->getValue('text'));
                $newInzerat->setAddress($this->request()->getValue('address'));
                $newInzerat->setPhoneNumber($this->request()->getValue('phone_number'));
                $newInzerat->setPrice($this->request()->getValue('price'));
                $newInzerat->setLoginFk($_SESSION["name"]);
                $newInzerat->save();
            }
        }
        $this->redirect('home');
    }

    public function soloInzerat(){
        $inzeraty = Inzerat::getAll();

        $inzeratId = $this->request()->getValue('inzeratId');
        return $this->html(
            [
                'inzeraty' => $inzeraty,
                'inzeratId' => $inzeratId
            ]);
    }

    public function myList()
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


    public function inzeratForm()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html();
    }

    public function contact()
    {
        return $this->html(
            []
        );
    }

    public function gpu()
    {
        $inzerat = Inzerat::getAll();

        return $this->html(
            [
                'inzerat' => $inzerat
            ]);
    }

    public function cpu()
    {
        $inzerat = Inzerat::getAll();

        return $this->html(
            [
                'inzerat' => $inzerat
            ]);
    }

    public function mb()
    {
        $inzerat = Inzerat::getAll();

        return $this->html(
            [
                'inzerat' => $inzerat
            ]);
    }

    public function ram()
    {
        $inzerat = Inzerat::getAll();

        return $this->html(
            [
                'inzerat' => $inzerat
            ]);
    }

    public function hdd()
    {
        $inzerat = Inzerat::getAll();

        return $this->html(
            [
                'inzerat' => $inzerat
            ]);
    }

    public function psu()
    {
        $inzerat = Inzerat::getAll();

        return $this->html(
            [
                'inzerat' => $inzerat
            ]);

    }

    public function cooling()
    {
        $inzerat = Inzerat::getAll();

        return $this->html(
            [
                'inzerat' => $inzerat
            ]);
    }

    public function case()
    {
        $inzerat = Inzerat::getAll();

        return $this->html(
            [
                'inzerat' => $inzerat
            ]);
    }
}