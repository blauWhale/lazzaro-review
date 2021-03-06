<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <link rel="stylesheet" type="text/css" href="/css/home-page.css" >
    <link rel="stylesheet" type="text/css" href="/css/review-page.css" >
    <script src="/js/index.js"></script>

    <title><?= $title; ?> | Home</title>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark " id="header">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="navbar-brand">
                            <a class="nav-link active" aria-current="page" href="/review">Home</a>
                        </li>
                        <li class="navbar-brand">
                            <a class="nav-link active" aria-current="page" href="/review">Review</a>
                        </li>
                        <li class="navbar-brand">
                            <a class="nav-link active" href="/contact">Kontakt</a>
                        </li>
                        <?php if (!isset($_SESSION["IsLoggedIn"])) { ?>
                        <li class="navbar-brand">
                            <a class="nav-link active" href="/user/login">Login</a>
                        </li>
                        <li class="navbar-brand">
                            <a class="nav-link active" href="/user/create">Registrieren</a>
                        </li>
                        <?php
                        }
                        if (isset($_SESSION["user"]) && $_SESSION["user"]->moderator) { ?>
                        <li class="navbar-brand">
                            <a class="nav-link active" href="/review/create">Review Erstellen</a>
                        </li>
                        <?php } ?>
                        <?php if (isset($_SESSION["IsLoggedIn"]) ) { ?>
                            <li class="navbar-brand">
                                <a class="nav-link active" href="/user/doLogout">Abmelden</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
      <h1><?= $heading; ?></h1>
