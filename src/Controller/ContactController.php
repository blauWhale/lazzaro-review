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

        if (isset($_POST["sendMail"])) {

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail-> SMTPDebug = 2;
            $mail->Host = 'localhost';
            $mail->SMTPAuth = true;
            $mail->Username = 'test';
            $mail->Password = '1234';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 25;
            $mail-> From = $_POST["email"];
            $mail-> FromName = $_POST["vorname"]. $_POST["nachname"];
            $mail-> addAddress("samuel.hajnik@bbcag.ch", "Samuel Hajnik");
            $mail-> isHTML(true);
            $mail-> Subject = 'Kontaktformular';
            $mail-> Body = $_POST["msg"];


            if ($mail->send()){
                header('Location: /contact');
            }else{
                header('Location: /');
            }

        }
    }
}