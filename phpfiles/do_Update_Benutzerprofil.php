<?php

include '../passwords/db.php';
session_start();

$post = $_POST["post"];
$username = $_SESSION["username"];

$pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
$sql = "INSERT INTO posts (author, content) VALUES (?, ?)";
$statement = $pdo->prepare($sql);
$statement->execute(array("$username", "$post"));


header("Location: ../index.php");







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

header("Location: Benutzerprofil.php");
*/?><!--

-->
