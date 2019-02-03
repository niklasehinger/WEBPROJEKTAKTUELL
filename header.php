<?php
session_start();
include 'passwords/db.php';

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    echo "

<html lang=\"de\">
<head>
<title>Pigeon</title>
    <link rel=\"icon\" href=\"Logos/Logo-Blau.png\" type=\"image\" sizes=\"16x16\">
</head>
<style>

    .shadow {
    background-color: white;
    border-radius: 300px ;
    box-shadow:1px 1px 30px 1px  darkblue;
     padding:50px
}

    body {
    padding-top: 5rem;
    background: url('pictures/BG.jpg');
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
<!DOCTYPE html>

<html lang="en">
<head>
    <title>Pigeon</title>
    <link rel="icon" href="Logos/Logo-Blau.png" type="image" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: whitesmoke;">
    <a class="navbar-brand" href="index.php">
        <img src="Logos/Logo-Blau.png" alt="logo" style="width:40px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="dropdown01" style="color: #0068ff"
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


                            echo '<ul>';
                            echo '<li>';
                            echo '<a class="icon-pencil" href="do_gelesen.php?usernameandere=' . $row["author"] . '&id=' . $row["id"] . '">Neuer Beitrag von ' . $row["author"] . '</a>';
                            echo '</li>';
                            echo '</ul>';
                            echo '<div class="dropdown-divider"></div>';

                        }
                    } else {
                        echo '<ul class="nav-item">Keine neuen Nachrichten</ul>';
                    }

                    ?>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
                <a class="navbar-brand" href="Benutzerprofil.php">
                    <?php
                    $file_pointer = 'profilbild/' . $username;
                    if (file_exists($file_pointer)) {
                        echo "<img src=\"$file_pointer\" class='rounded-circle img-fit' width=\"39\" height=\"39\"  alt=\"Profilbild\">";
                    } else {
                        echo "<img src=\"profilbild/root.jpg\" class='rounded-circle img-fit' width=\"39\" height=\"39\" alt=\"Profilbild\">";
                    }
                    ?>
                </a>
            </li>
            <form class="form-inline" action="do_suchen.php" method="get">
                <input class="form-control mr-sm-2" type="search" placeholder="Suchen" name="searchbox"
                       aria-label="Search">
                <button class="btn btn-outline-default bildposten my-2 my-sm-0" type="submit" style="color: #0068ff;">
                    Los!
                </button>
            </form>
            <form class="form-inline" method="post" action="phpfiles/logout.php">
                <button type="submit" class="btn btn-default" style="color: #0068ff;">Logout</button>
            </form>
        </ul>
    </div>
</nav>