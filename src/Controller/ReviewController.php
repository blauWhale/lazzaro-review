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
        $trackRepository = new TrackRepository();

        $view = new View('review/create');
        $view->title = 'Review erstellen';
        $view->heading = 'Review erstellen';
        $view->tracks = $trackRepository->readAll();
        $view->display();
    }

    public function doCreateTrack()
    {
        if (isset($_POST['createTrack'])) {
            $trackname = $_POST['trackname'];
            $producer_name = $_POST['producer_name'];
            $artist_name = $_POST['artist_name'];
            $genre = $_POST['genre'];
            $release_year = $_POST['release_year'];

            $trackRepository = new TrackRepository();
            $trackRepository->create($trackname, $producer_name, $artist_name, $genre, $release_year);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /review/create');
    }

    public function doCreate()
    {
        if (isset($_POST['createReview'])) {
            $rating = $_POST['rating'];
            $content = $_POST['content'];
            $user_id = $_POST['user_id'];
            $track_id = $_POST['trackOption'];

            $reviewRepository = new ReviewRepository();
            $reviewRepository->create($rating, $content, $user_id, $track_id);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /review');
    }

}
