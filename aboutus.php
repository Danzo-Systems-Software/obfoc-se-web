<?php
session_start();


?>


<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/aboutus.css">
        <title>O nas - Sfoc.SE</title>
    </head>
    <body>
    <!-- navbar z przyciskami -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Obfoć.SE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href="index.php">Mapka </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#addInfo" data-toggle="modal" data-target="#addInfo">Zaaktualizuj pozycję pojazdu</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="aboutus.php">O nas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dla deweloperów
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Dokumentacja API</a>
                <a class="dropdown-item" href="#">Repozytorium na githubie</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Jak nas wspomóc?</a>
            </div>
            </li>
        </ul>
        <span class="navbar-text">
        <!-- user account space -->
            <?php
            if(isset($_SESSION["username"])){
                
                echo("Witaj ".$_SESSION["username"]."!");
            } else {
                echo("Witaj anonimowy mikolu!");
            }
            ?>
        </span>

        <div 
    </body>
</html>