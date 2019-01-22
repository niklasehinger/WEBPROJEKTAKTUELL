<?php
session_start();
include 'passwords/db.php';
$usernameandere = $_SESSION ["usernameandere"] ; //hole usernameandere aus der URL
$username = $_SESSION ["username"]; //hole den nutzernamen von der person, die eingeloggt ist aus der session

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

$statement = $pdo->prepare("INSERT INTO following (username, usernameandere) VALUES (?,?)");
$statement->execute(array("$username","$usernameandere"));

$statement2 = $pdo->prepare("INSERT INTO posts (gelesen) VALUES ('1') WHERE author = ANY (SELECT usernameandere from following WHERE username=:username)");
$statement2->execute();


header ("Location: andererprofile.php?usernameandere=$usernameandere");

?>