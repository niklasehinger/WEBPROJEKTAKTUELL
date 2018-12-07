<?php

include '../passwords/db.php';
session_start();

$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$studiengang = $_POST["studiengang"];
$email = $_POST["email"];
$username = $_SESSION["username"];


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

$statement = $pdo->prepare("UPDATE users SET vorname = :vorname_neu, email = :email_neu, nachname = :nachname_neu, studiengang = :studiengang_neu WHERE username = :username");
$statement->execute(array('username' => $username, 'email_neu' => $email, 'vorname_neu' => $vorname, 'nachname_neu' => $nachname, 'studiengang_neu' => $studiengang));

header("Location: ../Benutzerprofil.php");
?>


