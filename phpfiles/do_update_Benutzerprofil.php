<?php

include '../passwords/db.php';
session_start();

$vorname = htmlentities($_POST['vorname'], ENT_QUOTES);
$nachname = htmlentities($_POST['nachname'], ENT_QUOTES);
$studiengang = htmlentities($_POST['studiengang'], ENT_QUOTES);

$username = $_SESSION["username"];



$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

$statement = $pdo->prepare("UPDATE users SET vorname = :vorname_neu, nachname = :nachname_neu, studiengang = :studiengang_neu WHERE username = :username");
$statement->execute(array('username' => $username, 'vorname_neu' => $vorname, 'nachname_neu' => $nachname, 'studiengang_neu' => $studiengang));

header("Location: ../Benutzerprofil.php");
?>



