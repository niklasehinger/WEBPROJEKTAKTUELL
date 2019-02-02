<?php
session_start();
include 'passwords/db.php';

$usernameandere = $_SESSION ["usernameandere"] ;
$username = $_SESSION ["username"];

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

$statement = $pdo->prepare("DELETE FROM following WHERE usernameandere=:usernameandere AND username=:username");
$statement->execute(array(":username"=>"$username",":usernameandere"=>"$usernameandere"));

header ("Location: andererprofile.php?usernameandere=$usernameandere");

?>