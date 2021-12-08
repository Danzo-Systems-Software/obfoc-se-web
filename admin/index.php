<?php
  session_start();
  //$_SESSION['username'] = "Hirek";
  if($_SESSION["isdestroyed"]==true){
    session_destroy();
  }

  require "config.php";
  // mysql 
  $conn = new mysqli($mysql_hostname, $mysql_username, $mysql_password);
  
  // Conn status
  if ($conn->connect_error) {
    die("Wystąpił błąd z bazą danych: " . $conn->connect_error);
  }
  $conn -> select_db("cigj");

  $result = $conn -> query("SELECT count(*) AS total FROM reports WHERE isOpenned = 1;");
  $data= $result -> fetch_assoc();


$mod_security_violations = 0;
$mod_reported_infos = $data['total'];

$mod_alerts_count = $mod_reported_accounts + $mod_reported_infos;
$new_user_past_week = 47;
$new_infos_past_week = 83;
?>
<!doctype html>
<html lang="pl">
  <head>
    <title>Obfoć.SE - Twój serwis informacyjny</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/our-css/index.css">
    <!-- OpenGraph meta tags -->
    <emta name="og:title" content="Obfoć.SE">
    <meta name="og:url" content="http://obfoć.se/">
    <meta name="og:image" content="favicon.png">
    <meta name="og:description" content="Strona poświęcona wysyłaniu sobie informacji o pociągach w Polsce i w Europie. W dużym skrócie to takie Co i gdzie jedzie z mapką :)">
    <meta name="theme-color" content="#42f598">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/4dd4ba4020.js" crossorigin="anonymous"></script>

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
              <a class="nav-link" href="/index.php"><i class="far fa-map"></i> Mapka <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/index.php#addInfo" data-toggle="modal" data-target="#addInfo"><i class="fas fa-pen-alt"></i> Zaaktualizuj pozycję pojazdu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/aboutus.php"><i class="far fa-address-card"></i> O nas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/zestawienia.php"><i class="fas fa-train"></i> Zestawienia</a>
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
            <li class="nav-item">
              <a class="nav-link active" href="/admin/index.php"><i class="fas fa-shield-alt"></i> Panel administratora</a>
            </li>
          </ul>
          <span class="navbar-text">
          <!-- user account space -->
            <?php
              if(isset($_SESSION["username"])){
                
                echo("Witaj ".$_SESSION["username"]."! ");
                echo('<a type="button" class="btn btn-primary btn-sm" href="/logout.php"><i class="fas fa-sign-out-alt"></i> Wyloguj</a>');
              } else {
                echo('<a type="button" class="btn btn-primary btn-sm" href="/login.php"><i class="fas fa-sign-in-alt"></i> Zaloguj się</a>');
              }
            ?>
        </span>

        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
          <br />
            <div class="card" style="width: 100%;">
              <div class="card-body">
              <h5 class="card-title">Moderacja 
                <?php
                  if ($mod_alerts_count < 5 && $mod_alerts_count != 0){
                    echo('<span class="badge bg-secondary" style="color: white">'.$mod_alerts_count.'</span>'); // w normie
                  }
                  else if ($mod_alerts_count >= 5 && $mod_alerts_count < 10){
                    echo('<span class="badge bg-warning" style="color: white">'.$mod_alerts_count.'</span>'); // nalezaloby ogarnąć zgloszenia
                  }
                  else if($mod_alerts_count == 0){
                    echo("");
                  }
                  else{
                    echo('<span class="badge bg-danger" style="color: white">'.$mod_alerts_count.'</span>'); // mode do roboty
                  }
                ?></h5>
              <div class="card-text">
                  <p><b><?php echo($mod_reported_infos); ?></b> zgłoszeń;</p>
                  <p><b><?php echo($mod_security_violations); ?></b> problemów z bezpieczeństwem</p>
              </div>
                <a href="/admin/moderation.php?" class="btn btn-success btn-sm">Szczegóły</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
          <br />
            <div class="card" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Statystyki</h5>
                <div class="card-text">
                  <p><b><?php echo($new_user_past_week);?></b> nowych użytkowników w ciągu ostatniego tygodnia</p>
                  <p><b><?php echo($new_infos_past_week);?></b> aktualizacji mapy</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>