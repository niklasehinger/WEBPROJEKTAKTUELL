<?php
session_start();
include 'passwords/db.php';

$username = $_SESSION ["username"];

$usernameandere = htmlentities($_GET['usernameandere'], ENT_QUOTES);
$id = htmlentities($_GET['id'], ENT_QUOTES);


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

$statement = $pdo->prepare("UPDATE posts SET gelesen = '1' Where id=:id_neu");
$statement->execute(array(":id_neu" => "$id"));

header("Location: andererprofile.php?usernameandere=$usernameandere");