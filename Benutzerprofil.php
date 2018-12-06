<?php
session_start();
include 'passwords/db.php';
include 'header.html';

if(!isset($_SESSION['username'])) {
    echo "Fehler!!   ";
    echo"Bitte zuerst <a href=\"start.php\">einloggen</a>";
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mein Profil</title>
</head>

<head>
    <meta charset="UTF-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="src/fullclip.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Mein Profil</title>
</head>

<body>

<div id="container" align="center" style="width:100%; height:100%">
   <h1>Deine Daten</h1>
    <div class="profil" align="center" style="width: 50%; height: 50%; background-color: #2b4046; color: white; margin-top: 10px; padding-top: 5px">
        <?php
        $pdo = new PDO($dsn, $dbuser, $dbpass, $option);

        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        } else {
            die("Bitte zuerst einloggen!!");
        }

        $statement = $pdo->prepare("SELECT * FROM users WHERE username = '$username'");
        $statement->execute(array($username));
        while($row = $statement->fetch()) {
            echo $row['vorname']." ".$row['nachname']."<br /><br />";
            echo "Studiengang: ".$row['studiengang']."<br /><br />";
            echo "E-Mail: ".$row['email']."<br /><br />";
        }
        ?>
    </div>
</div>




</body>
</html>