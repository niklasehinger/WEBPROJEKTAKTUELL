<?php
session_start();
include 'passwords/db.php';
include 'header.php';
$usernameandere = $_SESSION ["usernameandere"] ; //hole usernameandere aus der URL
$username = $_SESSION ["username"];


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);


$sql = "SELECT date, author, content, posts_id, bild_id from posts where posts_id = WHERE usernameandere=:usernameandere AND username=:username";
$query = $pdo->prepare($sql);
$query->execute (array("$username","$usernameandere"));

header ("Location: andererprofile.php?usernameandere=$usernameandere");

?>

