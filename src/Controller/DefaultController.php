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

        $view = new View('default/index');
        $view->title = 'Startseite';
        $view->heading = 'Startseite';
        $view->reviews = $reviewRepository->readAll();
        $view->display();
    }

    public function search(){
        $view = new View('default/search');
        $view->title = 'Suchen';
        $view->heading = 'Suchen';
        $view->display();
    }

    public function doSearch(){
        $searchRepository = new ReviewRepository();
        $searchRepository->search();
    }
}
