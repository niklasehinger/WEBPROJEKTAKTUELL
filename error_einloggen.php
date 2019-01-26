<?php
$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    echo "

<html lang=\"de\" xmlns=\"http://www.w3.org/1999/html\">
<title>Pigeon</title>
<head>
    
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, shrink-to-fit=no\">
    <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
    <script src=\"../ui/sweetalert/sweetalert2.min.js\"></script>
    <script src=\"https://code.jquery.com/jquery-3.3.1.min.js\"></script>
    <link rel=\"stylesheet\" href=\"../ui/sweetalert/sweetalert2.min.css\">
    <link rel=\"stylesheet\" href=\"htteps://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
    <link href=\"https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i\" rel=\"stylesheet\">
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">
    <style>
    .shadow {
    background-image: url("Logos/");
    background-color: whitesmoke;
    border-radius: 100px ;
    box-shadow:1px 1px 30px 1px  lightgrey;
}
</style>
</head>
    <div class=\"container\" style=\"margin-top: 200px\">
        <div class='jumbatron'>    
           <a class=\"center-block btn btn-outline-dark center\" href=\"start.php\" align=\"center\" role=\"button\" >
                    <img src=\"Logos/Pigeonlogo_einloggen.png\" href=\"start.php\" type=\"button\" class=\"img-responsive logo shadow\" style=\"display:inline\" alt=\"Logo\" width=\"350\" height=\"350\"> 
                </a>
                </div>
            </div>   
             ";
    die();
}
?>