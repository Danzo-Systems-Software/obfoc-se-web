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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index: 999;">
          <a class="navbar-brand" href="#"><i class="fas fa-camera-retro"></i> Obfoć.SE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Mapka</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#addInfo" data-toggle="modal" data-target="#addInfo">Zaaktualizuj pozycję pojazdu</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="aboutus.php">O nas <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dla deweloperów
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Dokumentacja API</a>
                  <a class="dropdown-item" href="https://github.com/Danzo-Systems-Software/obfoc-se-web"><i class="fab fa-github"></i> Repozytorium na githubie</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Jak nas wspomóc?</a>
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
                  echo('<a type="button" class="btn btn-primary btn-sm" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Zaloguj się</a>');
                }
              ?>
          </span>
          </div>
        </nav>
        <div class="container">
            <h1>Skąd pomysł na Obfoć.SE</h1>
            <p>Przeglądając grupy informacyjne o składach na facebooku jakimi są np. 
            "<a href="https://www.facebook.com/groups/868055790230479/">Co i gdzie jedzie?</a>"
            w małej grupce entuzjastów kolei i informatyki postanowiliśmy spróbować sprawdzić, czy podołamy takiemu wyzwaniu jakim jest napisanie
             właśnie takiej aplikacji jaką jest Obfoć.SE bez wsparcia profesjonalnych programistów. Jeśli czytasz tą wiadomość to znaczy, że się nam udało
             stworzyć aplikację, która będzie przystępna chociaż jakiejś grupce pasjonatów kolei.</p> 

             <p>Naszym celem jest to, aby aplikacja była jak najbardziej przejrzysta, prosta w obsłudze i otwarta na propozycje społeczności, które można
             składac <a href="https://github.com/Danzo-Systems-Software/obfoc-se-web/issues">w zakładce issues na githubie projektu</a>.</p>

             <h1>Kim tak właściwie jesteśmy</h1>
             <p>
             Szrzerze mówiąc to projekt prowadzą dwie osoby.
             <ul>
                <li>Oskar "Hirek" Jagodziński - pomysłodawca i głowny programista</li>
                <li>Stanisław "Mruczący" Radomski - również główny programista</li>
             </ul>
             To, że na tej liście są tylko dwie osoby może się jeszcze zmienić, dlatego <a href="">tu jest pełna lista twórców</a>.
             Jesteśmy otwarci na współtwórców.
            Można napisać do nas na discordzie (Hirek#5674, lub Mrzuczący#5313)
             </p>

             <h1>Tu trochę technicznie<h1>
             <h4>Jakie technologie wykorzystujemy</h4>
             <p>
                Umieszczamy tą informację ze względu na to, że mogą się znaleźć osoby, które to może interesować (xD). Pełna lista o tu:
                <ul>
                    <li><a href="https://getbootstrap.com/">Bootstarp 4.0.0</a></li>
                    <li><a href="https://popper.js.org/">Pooper 1.12.9</a></li>
                    <li><a href="https://jquery.com/">jQuerry 3.2.1</a></li>
                    <li><a href="https://leafletjs.com/">Leafletjs 1.7.1</a></li>
                </ul>
            </p>
        </div>
    </body>
</html>