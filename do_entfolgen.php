<?php
session_start();
include 'passwords/db.php';
$usernameandere = $_SESSION ["usernameandere"] ; //hole usernameandere aus der URL
$username = $_SESSION ["username"]; //hole den nutzernamen von der person, die eingeloggt ist aus der session

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

$statement = $pdo->prepare("DELETE FROM following WHERE usernameandere=:usernameandere AND username=:username");
$statement->execute(array(":username"=>"$username",":usernameandere"=>"$usernameandere"));

header ("Location: andererprofile.php?usernameandere=$usernameandere");

?>