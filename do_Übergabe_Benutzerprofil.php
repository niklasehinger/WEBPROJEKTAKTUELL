<?php
session_start();
if(!isset($_SESSION["username"]))
{
    echo"Bitte zuerst <a href=\"login.html\">einloggen</a>";
    die();
}
else {
    $eingeloggt = $_SESSION['username'];
    echo "Hallo User: ".$eingeloggt;
}

if(isset($_POST["Update"]))
{
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $email = $_POST["email"];

    $fakultät = $_POST["fakultät"];
    $studiengang = $_POST["studiengang"];

    $semester = $_POST["semester"];

    $arbeitgeber = $_POST["arbeitgeber"];

}

else
{
    echo"Keine Daten";
    die();
}


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

$statement = $pdo->prepare("UPDATE users SET vorname=:vorname , nachname=:nachname , email=:email , fakultät=:fakultät , studiengang=:studiengang , semester=:semester , arbeitgeber=:arbeitgeber WHERE id=:userid");

$ergebnis = $statement->execute(array( ':userid'=>$eingeloggt, ':vorname'=>$vorname , ':nachname'=>$nachname , ':email'=>$email, ':fakultät'=>$fakultät , ':studiengang'=>$studiengang , ':semester'=>$semester , ':arbeitgeber'=>$arbeitgeber  ));


if($ergebnis) {
    echo 'Du hast erfolgreich deine Angaben geändert. <a href="Benutzerprofil(1).php">Weiter zum Profil</a>';
}
else {
    echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
    echo "Datenbank-Fehler:";
    echo $statement->errorInfo()[2];
    echo $statement->queryString;
    die();
}







/*include_once ('./passwords/db.php');
if (isset ($_POST ["vorname"]) AND isset ($_POST ["nachname"]) AND isset ($_POST ["email"])  AND isset ($_POST ["fakultät"]) AND isset ($_POST ["studiengang"]) AND isset ($_POST ["semester"]) AND isset  ($_POST ["projekte"] AND isset ($_POST ["arbeitgeber"]) AND isset ($_POST ["websites"]);

$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$email = $_POST["email"];

$fakultät = $_POST["fakultät"];
$studiengang = $_POST["studiengang"];
$studiengang1 = $_POST["studiengang1"];
$studiengang2 = $_POST["studiengang2"];
$semester = $_POST["semester"];
$projekte = $_POST["projekte"];

$arbeitgeber = $_POST["arbeitgeber"];

$websites = $_POST["websites"];


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

$statement = $pdo->prepare($sql);
$statement->execute(array( "$vorname", "$nachname", "$email"));
$row = $statement->fetchObject();

header("Location: Benutzerprofil(1).php");
*/?><!--

-->
