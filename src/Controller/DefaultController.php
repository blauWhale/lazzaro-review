<?php

namespace App\Controller;

use App\Repository\ReviewRepository;
use App\Repository\TrackRepository;
use App\View\View;


class DefaultController
{

    public function index()
    {
        $reviewRepository = new ReviewRepository();
        $trackRepository = new TrackRepository();

        $view = new View('default/index');
        $view->title = 'Startseite';
        $view->heading = 'Startseite';

        $filter = array();
        if(!empty($_GET['searchYear'])){
            $filter["release_year"]= $_GET['searchYear'];
        }else if(!empty($_GET['searchGenre'])){
            $filter["genre"]= $_GET['searchGenre'];
        }else if(!empty($_GET['searchContent'])){
            $filter["content"]= $_GET['searchContent'];
        }

        if(sizeof($filter) > 0){
            $reviewRepository = new ReviewRepository();
            $view->reviews = $reviewRepository->search($filter);
        }else{
            $view->reviews = $reviewRepository->readAll();
        }
        $view->genres = $trackRepository->readAllBySelector(100,'genre');
        $view->years = $trackRepository->readAllBySelector(100,'release_year');
        $view->display();
    }
}
