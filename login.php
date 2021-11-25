<?php



if ($_GET["logout"] == "1"){
    session_destroy();

    $_SESSION["isdestroyed"] = true;
    header('Location: '."index.php");
    exit();
}
if($_GET["logout"]!="1"){
    session_start();
    $_SESSION['username'] = "Hirek";
}
if ($_GET["username"] == NULL){
    header('Location: '."index.php");
    exit();
}


//header('Location: '."index.php");





?>