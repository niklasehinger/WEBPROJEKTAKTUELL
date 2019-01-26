<?php
session_start();
include 'passwords/db.php';

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    echo "

<html lang=\"de\">
<title>Pigeon</title>
<head>
    <style>
    .shadow {
    background-color: white;
    border-radius: 300px ;
    box-shadow:1px 1px 30px 1px  darkblue;
     padding:50px
}

    body {
    padding-top: 5rem;
    background: url('Logos/BG.jpg');
    background-size: cover;
    font: 14px Roboto, sans-serif;
    background-color: white;
        }
}
</style>
</head>
    <div class='container' style=\"margin-top: 50px \" align='center'>
        <div class='marginmedia' align='center'>
           <a class=\"center-block btn btn-outline-dark center\" href=\"start.php\" align=\"center\" role=\"button\" >
                    <img src=\"Logos/Logo-Text-Blau.png\" href=\"start.php\" type=\"button\" class=\"img-responsive shadow\" style=\"display:inline\" alt=\"Logo\" width=\"200\" height=\"200\"> 
                    <h2 style='padding: 20px; color: white'>Bitte erst einloggen!</h2>
           </a>
        </div>   
    </div>
    
             ";
    die();
}

?>