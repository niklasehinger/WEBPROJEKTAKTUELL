<?php
session_start();
include 'passwords/db.php';
$username = $_SESSION ["username"]; //hole den nutzernamen von der person, die eingeloggt ist aus der session
$usernameandere=$_GET['usernameandere'];
$id=$_GET['id'];


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

$statement = $pdo->prepare("UPDATE posts SET gelesen = '1' Where id=:id_neu");
$statement->execute(array(":id_neu"=>"$id"));

header("Location: andererprofile.php?usernameandere=$usernameandere");