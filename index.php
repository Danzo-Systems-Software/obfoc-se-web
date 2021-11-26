<?php
  session_start();
  //$_SESSION['username'] = "Hirek";
  if($_SESSION["isdestroyed"]==true){
    session_destroy();
  }
  ?>
<html>
  <head>
    <title>Obfoć.SE - Twój serwis informacyjny</title>
    <link href="css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="our-css/index.css">
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
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Mapka <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#addInfo" data-toggle="modal" data-target="#addInfo">Zaaktualizuj pozycję pojazdu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.php">O nas</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dla deweloperów
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Dokumentacja API</a>
                  <a class="dropdown-item" href="#"><i class="fab fa-github"></i> Repozytorium na githubie</a>
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
                  echo('<a type="button" class="btn btn-primary btn-sm" href="login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> Zaloguj się</a>');
                }
              ?>
          </span>

          </div>
        </nav>
      <!-- map -->
      <div class="container">
          <div id="map"></div>
          
          
          <script>
          // map base script
          var mapTypeId = "mapbox/dark-v10" // this variable changes map type

          var mymap = L.map('map', {
            maxZoom: 20,
            minZoom: 5,
            zoomControl: false

          }).setView([51.985, 19.907], 7);
          L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
              maxZoom: 18,
              id: mapTypeId,
              tileSize: 512,
              zoomOffset: -1,
              accessToken: 'sk.eyJ1IjoicGFubXJoZXJvYnJpbmUiLCJhIjoiY2t3ZHU3d3g1MmFxZzJvcGFwNmpkeHVsZiJ9.pE6ugI6QMB678a00jTz3Sg'
          }).addTo(mymap);
          
          var rare_vehicles = L.layerGroup();


          // definition of locomotive icon
          var locoIcon = L.icon({
                      iconUrl: 'train.svg',
                      iconSize: 24,
                      popupAnchor: [0, 0],
                      tooltipAnchor: [0, 0]
                  });
          
          // function for adding markers with popup
          function addMarker(pos, vehicle, datetime, remarks){
            var marker = L.marker(pos, { icon: locoIcon }).addTo(mymap);
            if (typeof remarks == 'undefined'){
              marker.bindPopup("<h4>" + vehicle + "</h4><p1>Zaaktualizowano: " + datetime + "</p1>");
            }
            else {
              marker.bindPopup("<h4>" + vehicle + "</h4><p1>Zaaktualizowano: " + datetime + "</br><u>Uwagi: " + remarks + "</u></p1>");
            }

          }

          </script>
      </div>

      <script type="text/javascript">
        $(window).on('load', function() {
            $('#disclaimerModal').modal('show');
        });


        // Zmiana pozycji zoomu

      </script>
      <!-- Page under developement disclaimer -->
      <div class="modal fade" id="disclaimerModal" tabindex="-1" role="dialog" aria-labelledby="disclaimerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="disclaimerModalLabel">Uwaga!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Projekt Obfoć.SE jest ciągle w rozwoju. Należy się spodziewać pewnych niedociągnięć, błędów w funkcjonalności. Staramy się ciągle rozwijać projekt!
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Zrozumiano</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Add train form -->
      <div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="addInfoLbl" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addInfoLbl">Zaaktualizuj pozycję pojazdu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="updateTrain.php" method="post" class="needs-validation">
                  <div class="form-group">
                    <label for="vehicleType">Nazwa pojazdu:</label>
                    <input type="text" class="form-control" id="vehicleType" aria-describedby="vehicleType" placeholder="np. EP07-376" required>
                    <small id="vehicleTypeHelp" class="form-text text-muted">Na przykład ET22-933 lub 193-366. Wielkość liter ma znaczenie!!!</small>
                    <div class="invalid-feedback">
                      Proszę wprowadzić oznaczenie pojazdu!
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="remarks">Informacje dodatkowe:</label>
                    <input type="text" class="form-control" id="remarks" aria-describedby="remarks" placeholder="np. TLK 51112 Kociewie">
                    <small id="remarksHelp" class="form-text text-muted">Na przykład numer pociągu, relacja etc.</small>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Dodaj</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>

      <script>
      // Adding markers from DB
      var request = new XMLHttpRequest();
      request.open('GET', 'http://178.33.45.181:90/vehiclePositions', true);

      request.onload = function () {
          var data = JSON.parse(this.response)
        if (request.status == 200) {
          data.forEach(position => {
            var vehicleName = (position.vehicle);
            var pos = [position.latitude, position.longitude]
            var update = position.postDate;
            var posterNotes = position.posterNotes
            if (posterNotes == ""){
              addMarker(pos, vehicleName, update)
            }
            else{
              addMarker(pos, vehicleName, update, posterNotes)
            }
          })
        } else {
          console.log('error')
}
      }

      request.send();
    </script>
  </body>
</html>