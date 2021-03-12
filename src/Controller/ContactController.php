<?php


namespace App\Controller;


use App\View\View;

class ContactController{

    public function index(){
        $view = new View('contact/index');
        $view->title = 'Kontakt';
        $view->heading = 'Kontakt';
        $view->display();
    }

}