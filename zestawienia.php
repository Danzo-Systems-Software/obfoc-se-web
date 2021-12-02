<?php
session_start();


?>

<!doctype html>
<html lang="pl">
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="our-css/aboutus.css">
        <link href="css/all.css" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>O nas - Obfoć.SE</title>
        <link rel="icon" type="image/x-icon" href="favicon.png">
        <!-- OpenGraph meta tags -->
        <emta name="og:title" content="O Obfoć.SE i prowadzących">
        <meta name="og:url" content="http://obfoć.se/">
        <meta name="og:image" content="favicon.png">
        <meta name="og:description" content="Strona poświęcona wysyłaniu sobie informacji o pociągach w Polsce i w Europie. W dużym skrócie to takie Co i gdzie jedzie z mapką :)">
        <meta name="theme-color" content="#42f598">
    </head>
    <body>  
    <!-- navbar z przyciskami -->
    <!-- navbar z przyciskami -->
    <!-- navbar z przyciskami -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index: 999;">
          <a class="navbar-brand" href="#"><i class="fas fa-camera-retro"></i> Obfoć.SE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="far fa-map"></i> Mapka <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.php"><i class="far fa-address-card"></i> O nas</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="zestawienia.php"><i class="fas fa-train"></i> Zestawienia</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-file-code"></i> Dla deweloperów
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#"><i class="fas fa-globe-americas"></i> Dokumentacja API</a>
                  <a class="dropdown-item" href="https://github.com/Danzo-Systems-Software/obfoc-se-web"><i class="fab fa-github"></i> Repozytorium na githubie</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="fas fa-dollar-sign"></i> Jak nas wspomóc?</a>
                </div>
              </li>
            </ul>
            <span class="navbar-text">
            <!-- user account space -->
              <?php
                if(isset($_SESSION["username"])){
                  
                  echo("Witaj ".$_SESSION["username"]."! ");
                  echo('<a type="button" class="btn btn-primary btn-sm" href="logout.php"><i class="fas fa-sign-out-alt"></i> Wyloguj</a>');
                } else {
                  echo('<a type="button" class="btn btn-primary btn-sm" href="login.php"><i class="fas fa-sign-in-alt"></i> Zaloguj się</a>');
                }
              ?>
          </span>
          </div>
        </nav>
        <div class="container">
            <br />
            <div class="alert alert-danger" role="alert">
                Sekcja w budowie. Przewidywany termin uruchomienia dopiero się pojawi, jak skończymy główną część strony
            </div>
        </div>
    </body>
</html>