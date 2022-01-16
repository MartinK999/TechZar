<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\Responses\Response;
use App\Models\Inzerat;
use App\Models\Photos;
use App\Models\Review;
use App\Models\users;

class ReviewController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
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

}