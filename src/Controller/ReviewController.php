<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Repository\ReviewHasCommentRepository;
use App\Repository\ReviewRepository;
use App\Repository\TrackRepository;
use App\Repository\UserRepository;
use App\View\View;

class ReviewController
{
    public function index()
    {
        $reviewRepository = new ReviewRepository();
        $trackRepository = new TrackRepository();
        $commentRepository = new CommentRepository();

        if(!isset($_GET['id']) || !$_GET['id'] || !is_numeric($_GET['id'])){
            header("Location: /");
        }

        $id = intval($_GET['id']);

        $view = new View('review/index');
        $view->title = 'Reviews';
        $view->heading = 'Reviews';
        $view->review = $reviewRepository->readById($id);
        $view->comments = $commentRepository->readAllByReviewId(100,$id);
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

            if (!isset($_POST['trackname']) || !isset($_POST['producer_name']) || !isset($_POST['artist_name']) || !isset($_POST['genre']) || !isset($_POST['release_year'])) {
                exit('Die Daten konnten nicht abgesendet werden!');
            }
            if (empty($_POST['trackname']) || empty($_POST['producer_name']) || empty($_POST['artist_name']) || empty($_POST['genre']) || empty($_POST['release_year'])) {
                exit('Bitte alle Felder ausfüllen!');
            }

            /*
            //TODO IMAGE UPLOAD
            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            if(isset($_POST["createTrack"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            */
            $trackname = $_POST['trackname'];
            $producer_name = $_POST['producer_name'];
            $artist_name = $_POST['artist_name'];
            $genre = $_POST['genre'];
            $release_year = $_POST['release_year'];
            //$filename = $_FILES["fileToUpload"]["name"];

            $trackRepository = new TrackRepository();
            $trackRepository->create($trackname, $producer_name, $artist_name, $genre, $release_year, $filename);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /review/create');
    }

    public function doCreate()
    {
        if (isset($_POST['createReview'])) {

            if (!isset($_POST['rating']) || !isset($_POST['content']) || !isset($_POST['user_id']) || !isset($_POST['trackOption'])) {
                exit("Die Daten konnten nicht abgesendet werden");
            }
            if (empty($_POST['rating']) || empty($_POST['content']) || empty($_POST['user_id']) || !isset($_POST['trackOption'])) {
                exit("Bitte alle Felder ausfüllen");
            }

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

    public function doDelete()
    {

        if (isset($_POST['delete_review'])) {
                $id = $_POST['review_id'];
                $reviewRepository = new ReviewRepository();
                $reviewRepository->deleteById($id);
                header('Location: /review/delete');
            }
    }

    public function delete()
    {

        $view = new View('review/delete');
        $view->title = 'Review gelöscht';
        $view->heading = 'Review gelöscht';
        $view->display();
    }


    public function doUpdate()
    {


        if (isset($_POST['doUpdate_review'])) {
            $id = $_POST['review_id'];
            $rating = $_POST['rating'];
            $content = $_POST['content'];
            $reviewRepository = new ReviewRepository();
            $reviewRepository->updateById($rating, $content, $id);
            header('Location: /review/');
        }
    }

    public function update()
    {
        $reviewRepository = new ReviewRepository();
        $trackRepository = new TrackRepository();

        $id = intval($_POST['review_id']);


        $view = new View('review/update');
        $view->title = 'Review bearbeiten';
        $view->heading = 'Review bearbeiten';
        $view->review = $reviewRepository->readById($id);
        $view->track = $trackRepository->readById($view->review->track_id);
        $view->display();
    }

    public function comment()
    {
        $currentDateTime = date("Y-m-d h:i:s");

        if(!isset($_POST['review_id']) || !$_POST['review_id'] || !is_numeric($_POST['review_id'])){
            header("Location: /");
        }

        if (isset($_POST['doComment'])) {
            $review_id = $_POST['review_id'];
            $comment_content = $_POST['comment_content'];
            $date = $currentDateTime;
            $user_id = $_POST['user_id'];
            $commentRepository = new CommentRepository();
            $commentRepository->create($comment_content, $date, $user_id, $review_id);

        }
        $detailLink = "/review?id=" . $_POST['review_id'] ;
        header("Location: " . $detailLink);

    }
}
