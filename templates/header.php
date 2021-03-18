<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <link rel="stylesheet" type="text/css" href="/css/index.css" >
    <link rel="stylesheet" type="text/css" href="/css/review-page.css" >

    <title><?= $title; ?> | Home</title>
  </head>
  <body>
  <?php if (isset($_SESSION["IsLoggedIn"])) { ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="header">
            <div class="container-fluid">
                <a class="navbar-brand" href="/default">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="navbar-brand">
                            <a class="nav-link active" aria-current="page" href="/review">Reviews</a>
                        </li>
                        <li class="navbar-brand">
                            <a class="nav-link active" href="/contact">Kontakt</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
  <?php }else {?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="header">
            <div class="container-fluid">
                <a class="navbar-brand" href="/default">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="navbar-brand">
                            <a class="nav-link active" aria-current="page" href="/review">Reviews</a>
                        </li>
                        <li class="navbar-brand">
                            <a class="nav-link active" href="/contact">Kontakt</a>
                        </li>
                        <li class="navbar-brand">
                            <a class="nav-link active" href="/user/login">Login</a>
                        </li>
                        <li class="navbar-brand">
                            <a class="nav-link active" href="/user/create">Registrieren</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
  <?php  }?>
    <main class="container">
      <h1><?= $heading; ?></h1>
