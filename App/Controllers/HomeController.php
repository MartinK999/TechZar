<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Favourite;
use App\Models\Inzerat;
use App\Models\Review;
use App\Models\Users;

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

    public function uploadReview()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $newReview = new Review();
        $newReview->setUserWriter($this->request()->getValue('userWriter'));
        $newReview->setUserId($this->request()->getValue('userId'));
        $newReview->setRating($this->request()->getValue('rating'));
        $newReview->setText($this->request()->getValue('text'));
        $newReview->setDate(date('d.m.Y   H:i:s',strtotime('+1 hour')));
        $newReview->save();

        $this->redirect('home');
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
            }
        }
                $newInzerat = new Inzerat();
                $newInzerat->setImage($name);
                $newInzerat->setCategory($this->request()->getValue('category'));
                $newInzerat->setTitle($this->request()->getValue('title'));
                $newInzerat->setText($this->request()->getValue('text'));
                $newInzerat->setAddress($this->request()->getValue('address'));
                $newInzerat->setPhoneNumber($this->request()->getValue('phone_number'));
                $newInzerat->setPrice($this->request()->getValue('price'));
                $newInzerat->setUserId($_SESSION["id"]);
                $newInzerat->save();

        $this->redirect('home');
    }


    public function soloInzerat(){
        $inzeraty = Inzerat::getAll();
        $users = Users::getAll();

        $inzeratId = $this->request()->getValue('inzeratId');
        return $this->html(
            [
                'users' => $users,
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



    public function reviewForm() //TODO 1. id
    {
        $userLogin = $this->request()->getValue('userLogin');
        $userId = $this->request()->getValue('userId');
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html(
            [
                'userLogin' => $userLogin,
                'userId' => $userId
            ]);
    }

    public function inzeratForm()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html();
    }



    public function deleteReview() {

        if(!Auth::isLogged()){
            $this->redirect('home');
        }
        $reviewId = $this->request()->getValue('id');
        $reviews = Review::getAll();
        foreach ($reviews as $r) {
            if($reviewId == $r->getId())
            {
                $r->delete();
            }
        }

        $this->redirect('home');
    }

    public function review() //TODO 2. id
    {
        $inzeraty = Inzerat::getAll();
        $userId = $this->request()->getValue('userId');
        $userLogin = $this->request()->getValue('userLogin');
        $userWriter = $this->request()->getValue('userWriter');
        $reviews = Review::getAll();
        $users = Users::getAll();

        return $this->html(
            [
                'users' => $users,
                'userId' => $userId,
                'userLogin' => $userLogin,
                'userWriter' => $userWriter,
                'reviews' => $reviews,
                'inzeraty' => $inzeraty
            ]
        );
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