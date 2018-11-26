
<?php

session_start();

$username = $_POST["username"];
$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$email = $_POST["email"];
$passwort = $_POST["passwort"];


$_SESSION ["id"]="$id";

include ("./passwords/db.php");

//Überprüfung, ob Kürzel in Datenbank bereits vergeben ist
$pdo_check = new PDO ($dsn, $dbuser, $dbpass,$option);
$sql_statement = "SELECT username FROM user WHERE username=:username";
$statement_check = $pdo_check->prepare($sql_statement);
$statement_check->execute(array(":username"=>"$username"));
$row = $statement_check->fetchObject();
if ($username == $row->username) {
    session_destroy(); ?>
    <div class="alert alert-danger" role="alert">
        <p>Benutzername bereits vergeben. Bitte wählen Sie einen anderen!</p>
    </div>

    <?php
    //header("Location: ../home/Startseite.php");
}else{    $_SESSION["log"] = "TRUE";
    header("Location: index.html");
}

//Daten in die Datenbank schreiben
$pdo = new PDO($dsn, $dbuser, $dbpass, $option);
$sql = "INSERT INTO users (username, vorname, nachname, email, passwort) VALUES (?, ?, ?, ?, ?)";
$statement = $pdo->prepare($sql);
$statement->execute(array("$username", "$vorname", "$nachname", "$email", "$passwort"));
$row = $statement->fetchObject();
?>





