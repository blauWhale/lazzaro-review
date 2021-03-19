<?php


namespace App\Controller;

use App\View\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController{

    public function index(){
        $view = new View('contact/index');
        $view->title = 'Kontakt';
        $view->heading = 'Kontakt';
        $view->display();
    }

    public function sendForm(){

        if (isset($_POST["submit"])) {
            //  mail("zhajns@bbcag.ch", "Kontaktformular", 'Name: ' . $_POST["vorname"] . $_POST["nachname"] . 'Email: ' . $_POST["email"] . 'Nachricht: ' . $_POST["msg"]);

            $mail = new PHPMailer(true);
            $mail-> From = $_POST["email"];
            $mail-> FromName = $_POST["vorname"]. $_POST["nachname"];
            $mail-> addAddress("samuel.hajnik@bbcag.ch", "Samuel Hajnik");
            $mail-> isHTML(true);
            $mail-> Subject = 'Kontaktformular';
            $mail-> Body = $_POST["msg"];
            try {
                $mail->send();
                echo "Das Kontaktformular wurde abgesendet";
            } catch (Exception $e){
                echo "Error: ". $mail->ErrorInfo;
            }
        }
    }
}