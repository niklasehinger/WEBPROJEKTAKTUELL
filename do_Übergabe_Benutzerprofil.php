<?php
session_start();
$id = $_SESSION['id'];
echo $id;

include_once ('./passwords/db.php');

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
$schule = $_POST["schule"];
$seit = $_POST["seit"];

$websites = $_POST["websites"];
$sociallinks = $_POST["sociallinks"];


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

$statement = $pdo->prepare($sql);
$statement->execute(array( "$vorname", "$nachname", "$email"));
$row = $statement->fetchObject();

header("Location: Benutzerprofil(1).php");

?>


