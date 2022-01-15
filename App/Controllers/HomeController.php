<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Favourite;
use App\Models\Inzerat;
use App\Models\Photos;
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

                $newInzerat = new Inzerat();

                $newInzerat->setCategory($this->request()->getValue('category'));
                $newInzerat->setTitle($this->request()->getValue('title'));
                $newInzerat->setText($this->request()->getValue('text'));
                $newInzerat->setAddress($this->request()->getValue('address'));
                $newInzerat->setPhoneNumber($this->request()->getValue('phone_number'));
                $newInzerat->setPrice($this->request()->getValue('price'));
                $newInzerat->setUserId($_SESSION["id"]);
                $newInzerat->setDate(date('d.m.Y   H:i:s',strtotime('+1 hour')));
                $newInzerat->save();




        $this->redirect('home', 'photosForm');
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

        $this->redirect('home','myList');
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
                'photos' => $photos

            ]);
    }



    public function reviewForm()
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

    public function review()
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
        $photos = Photos::getAll();

        return $this->html(
            [
                'inzerat' => $inzerat,
                'photos' => $photos
            ]);
    }

    public function cpu()
    {
        $inzerat = Inzerat::getAll();
        $photos = Photos::getAll();


        return $this->html(
            [
                'inzerat' => $inzerat,
                'photos' => $photos

            ]);
    }

    public function mb()
    {
        $inzerat = Inzerat::getAll();
        $photos = Photos::getAll();


        return $this->html(
            [
                'inzerat' => $inzerat,
                'photos' => $photos

            ]);
    }

    public function ram()
    {
        $inzerat = Inzerat::getAll();
        $photos = Photos::getAll();


        return $this->html(
            [
                'inzerat' => $inzerat,
                'photos' => $photos

            ]);
    }

    public function hdd()
    {
        $inzerat = Inzerat::getAll();
        $photos = Photos::getAll();


        return $this->html(
            [
                'inzerat' => $inzerat,
                'photos' => $photos

            ]);
    }

    public function psu()
    {
        $inzerat = Inzerat::getAll();
        $photos = Photos::getAll();


        return $this->html(
            [
                'inzerat' => $inzerat,
                'photos' => $photos

            ]);

    }

    public function cooling()
    {
        $inzerat = Inzerat::getAll();
        $photos = Photos::getAll();


        return $this->html(
            [
                'inzerat' => $inzerat,
                'photos' => $photos

            ]);
    }

    public function case()
    {
        $inzerat = Inzerat::getAll();
        $photos = Photos::getAll();


        return $this->html(
            [
                'inzerat' => $inzerat,
                'photos' => $photos

            ]);
    }
}