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

        $view = new View('review/index');
        $view->title = 'Reviews';
        $view->heading = 'Reviews';
        $view->review = $reviewRepository->readById($id);
        $view->track = $trackRepository->readById($view->review->track_id);
        $view->display();
    }

    public function create()
    {
        $reviewRepository = new ReviewRepository();

        $view = new View('review/create');
        $view->title = 'Review erstellen';
        $view->heading = 'Review erstellen';
        $view->reviews = $reviewRepository->readAll();
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $trackname = $_POST['trackname'];
            $producer_name = $_POST['producer_name'];
            $artist_name = $_POST['artist_name'];
            $genre = $_POST['genre'];
            $release_year = $_POST['release_year'];

            //$reviewRepository = new ReviewRepository();
            $trackRepository = new TrackRepository();
            $trackRepository->create($trackname, $producer_name, $artist_name, $genre, $release_year);
            //$reviewRepository->create($rating, $content, $user_id, $track_id);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /review');
    }

}
