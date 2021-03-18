<?php

namespace App\Controller;

use App\Repository\ReviewRepository;
use App\Repository\TrackRepository;
use App\View\View;

class ReviewController
{
    public function index()
    {
        $reviewRepository = new ReviewRepository();
        $trackRepository = new TrackRepository();

        if(!isset($_GET['id']) || !$_GET['id'] || !is_numeric($_GET['id'])){
            header("Location: /");
        }

        $id = intval($_GET['id']);


        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        $view = new View('review/index');
        $view->title = 'Reviews';
        $view->heading = 'Reviews';
        $view->review = $reviewRepository->readById($id);
        $view->track = $trackRepository->readById($view->review->track_id);
        $view->display();
    }
}
