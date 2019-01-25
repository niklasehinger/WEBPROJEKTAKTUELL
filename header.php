<?php
session_start();
include 'passwords/db.php';

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    echo "

<html lang=\"de\" xmlns=\"http://www.w3.org/1999/html\" xmlns=\"http://www.w3.org/1999/html\">
<title>Pigeon</title>
<head>
    
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, shrink-to-fit=no\">
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css\" integrity=\"sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS\" crossorigin=\"anonymous\">
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js\" integrity=\"sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k\" crossorigin=\"anonymous\"></script>
    <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js\" integrity=\"sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut\" crossorigin=\"anonymous\"></script>
    <style>
    .shadow {
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
    <!DOCTYPE html>

    <html lang="en">
    <head>
        <title>Navbar</title>
        <meta charset="utf-8">
        <title>Pigeon</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
              integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
                integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
                integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <script src="sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <style>


        </style>

    </head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>




    <nav class="navbar navbar-expand-lg sticky-top navbar-white " style="background-color: whitesmoke;>
    <div class=" container-fluid
    ">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Navigation ein-/ausblenden</span>
            <span class="icon-bar" style="background-color: #0068ff;"></span>
            <span class="icon-bar" style="background-color: #0068ff;"></span>
            <span class="icon-bar" style="background-color: #0068ff;"></span>
        </button>
        <a href="index.php">
            <img alt="Logo" src="Logos/Logo-Blau.png" style="display:inline" width="40" height="40">
        </a>
    </div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link" href="http://example.com" id="dropdown01" style="color: #0068ff"
           data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">Benachrichtigungen
            <?php //hier werden die ungelesenen nachrichten ausgelesen
            $anzahl = 0;
            $pdo = new PDO($dsn, $dbuser, $dbpass, $option);

            $statement = $pdo->prepare("SELECT * FROM posts WHERE gelesen='0' AND author = ANY (SELECT usernameandere from following WHERE username=:username)"); //nimm alls spalten aus der tabelle null wo gelesen auf null gessetzt ist, also die posts die noch ungelesen sind
            $statement->execute(array(":username" => "$username"));
            $anzahl = $statement->rowCount(); //zähle die zeilen in der tabelle wo er NULL findet und zeige die anzahl der spalten als anzahl der benachrichtigungen an

            ?>
            <span class="badge badge-primary"><?php echo $anzahl ?></span>
            <!--er soll die variable an dieser stelle ausgeben-->
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdown01">

            <?php // wenn es Nachrichten gibt, dann zeige Klasse 'dropdown-item', ansonsten führe else aus 'Keine neuen Nachrichten'

            if ($anzahl > 0) {

                $username = $_SESSION['username'];

                $sql = "SELECT * from posts WHERE gelesen='0' AND author = ANY (SELECT usernameandere from following WHERE username=:username)";
                $query = $pdo->prepare($sql);
                $query->execute(array(":username" => "$username"));
                $row = array();
                while ($row = $query->fetch()) {

                    //Beitrag wird als Listenelemt für das Dropdown in der Navbar zurückgegeben

                    echo '<a href="#">';
                    echo '<ul>';
                    echo '<li>';
                    echo '<a href="do_gelesen.php?usernameandere=' . $row["author"] . '&id=' . $row["id"] . '">Neuer Beitrag von ' . $row["author"] . '</a>';
                    echo '</li>';
                    echo '</ul>';
                    echo '</a>';
                    echo '<div class="dropdown-divider"></div>';

                }
            } else {
                echo 'Keine neuen Nachrichten';
            }

            ?>
        </div>
    </li>
    <di
    <li>
        <form class="nav navbar-form navbar-right" method="get" action="do_suchen.php" role="search">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="Suchen" aria-label="Search"
                       name="searchbox">
            </div>
            <button type="submit" class="btn btn-default">Los</button>
        </form>
    </li>

    <li>
        <div class="headerprofilbild">
            <a href="Benutzerprofil.php>
<?php

                    $statement = $pdo->prepare("SELECT pb FROM users WHERE username = :username");
                    $statement->execute(array(":username" => "$username"));
                    $query = $pdo->prepare($sql);
                    $query->execute();

                    $profilbild = $row['pb'];


                    if (file_exists("<img src='profilbild/$profilbild'>")) {
                        echo "<img class=\"img-circle\" src=\"profilbild/$profilbild\" style=\"padding: 5px\" width=\"50\" height=\"50\" alt=\"\">";
                    } else {
                        echo "<img class=\"img-circle\" src=\"profilbild/root.jpg\" style=\"padding: 5px\" width=\"50\" height=\"50\" alt=\"\">";
                    }
                    ?>
                </a>
            </div>
        </li>

        <li>
            <form class="navbar-form " method="post" style="margin-left: -15px" action="phpfiles/logout.php">
                <button type="submit" class="btn btn-default">Logout</button>
            </form>
        </li>
    </ul>
</div>
</nav>

