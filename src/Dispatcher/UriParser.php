<?php

namespace App\Dispatcher;

class UriParser
{

    public static function getControllerName()
    {
        $uriFragments = self::getUriFragments();

        if (!empty($uriFragments[0])) {
            $controllerName = $uriFragments[0];
            $controllerName = ucfirst($controllerName);
            return $controllerName;
        }

        return 'Default';
    }


    public static function getMethodName()
    {
        $uriFragments = self::getUriFragments();


        $method = 'index';
        if (!empty($uriFragments[1])) {
            $method = $uriFragments[1];
        }

        return $method;
    }

    private static function getUriFragments()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtok($uri, '?'); // Erstes ? und alles danach abschneiden
        $uri = trim($uri, '/'); // Alle / am Anfang und am Ende der URI abschneiden
        $uriFragments = explode('/', $uri); // In Einzelteile zerlegen

        return $uriFragments;
    }
}
