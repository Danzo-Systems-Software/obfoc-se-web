<?php

?>

<!doctype html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Logowanie - Obfoć.SE</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container">
        <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Logowanie do Obfoć.SE</a> 
                </div>
            </ul>
            <a href="index.php" class="btn btn-success">Powrót do strony głównej</a>
        </nav>
    
        <div class="row">
            <div class="col">
                <h3>Logowanie kontem Obfoć.SE</h3>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Adres e-mail, lub login</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Hasło</label>
                </div>
                <br>
                <button type="button" class="btn btn-success  btn-lg"><i class="fa-solid fa-right-to-bracket"></i>Zaloguj</button>
                <a href="" class="btn btn-link">Zapomniałem hasła</a>
            </div>

        <div class="col">
            <h3>lub wybierz inną metodę logowania:</h3>
            <br>
            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg" type="button">Zaloguj z facebookiem</button>
                <button class="btn btn-danger  btn-lg" type="button">Zaloguj przez google</button>
                <button class="btn btn-info  btn-lg" type="button">Zaloguj przez discorda</button>
            </div>
        </div>
        <footer>

            <br>
            <center>
            &copy 2021 - <?php echo date("Y"); ?> by Danzo Systems Software
            </center>
        </footer>
    </div>
  </body>
</html>