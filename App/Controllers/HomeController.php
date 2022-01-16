<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
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



    public function contact()
    {
        return $this->html(
            []
        );
    }

}