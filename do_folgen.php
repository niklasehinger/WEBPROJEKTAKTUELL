<?php
session_start();
include 'passwords/db.php';
$usernameandere = $_SESSION ["usernameandere"] ; //hole usernameandere aus der URL
$username = $_SESSION ["username"]; //hole den nutzernamen von der person, die eingeloggt ist aus der session

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

$statement = $pdo->prepare("INSERT INTO following (username, usernameandere) VALUES (?,?)");
$statement->execute(array("$username","$usernameandere"));

header ("Location: andererprofile.php?usernameandere=$usernameandere");

?>