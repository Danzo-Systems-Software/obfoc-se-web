<?php

session_start();

$username = $_SESSION["username"];
$trainType = $_POST["vehicleType"];
$remarks = $_POST["remarks"];

if($username != NULL){
    echo ("Dodawanie pojazdu: ".$trainType."<br>Z notką: ".$remarks);
}

?>