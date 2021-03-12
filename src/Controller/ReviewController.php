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

        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        $view = new View('review/index');
        $view->title = 'Reviews';
        $view->heading = 'Reviews';
        $view->track = $trackRepository->readById(1);
        $view->review = $reviewRepository->readById(3);
        $view->display();
    }
}
