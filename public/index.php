<?php


require_once __DIR__.'/../vendor/autoload.php';

use App\Dispatcher\Dispatcher;
use App\Exception\ExceptionListener;

session_start();
ExceptionListener::register();
Dispatcher::dispatch();
