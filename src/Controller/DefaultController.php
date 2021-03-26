<?php

namespace App\Controller;

use App\Repository\ReviewRepository;
use App\Repository\TrackRepository;
use App\View\View;

/**
 * Der Controller ist der Ort an dem es für jede Seite, welche der Benutzer
 * anfordern kann eine Methode gibt, welche die dazugehörende Businesslogik
 * beherbergt.
 *
 * Welche Controller und Funktionen muss ich erstellen?
 *   Es macht sinn, zusammengehörende Funktionen (z.B: User anzeigen, erstellen,
 *   bearbeiten & löschen) gemeinsam in einem passend benannten Controller (z.B:
 *   UserController) zu implementieren. Nicht zusammengehörende Features sollten
 *   jeweils auf unterschiedliche Controller aufgeteilt werden.
 *
 * Was passiert in einer Controllerfunktion?
 *   Die Anforderungen an die einzelnen Funktionen sind sehr unterschiedlich.
 *   Folgend die gängigsten:
 *     - Dafür sorgen, dass dem Benutzer eine View (HTML, CSS & JavaScript)
 *         gesendet wird.
 *     - Daten von einem Model (Verbindungsstück zur Datenbank) anfordern und
 *         der View übergeben, damit diese Daten dann für den Benutzer in HTML
 *         Code umgewandelt werden können.
 *     - Daten welche z.B. von einem Formular kommen validieren und dem Model
 *         übergeben, damit sie in der Datenbank persistiert werden können.
 */
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
            $view->genres = $trackRepository->readAllBySelector(100,'genre');
            $view->years = $trackRepository->readAllBySelector(100,'release_year');

        }
        $view->display();
    }
}
