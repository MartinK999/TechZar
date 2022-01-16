<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Inzerat;
use App\Models\Photos;
use App\Models\Review;
use App\Models\Users;

class CategoryController extends AControllerRedirect
{
    public function index()
    {


        return $this->html(
            [
                'post' => 'test'
            ]);
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