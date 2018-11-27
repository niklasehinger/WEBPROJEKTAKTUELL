<?php
include '../passwords/db.php';
include '../phpfiles/add_post.php';
session_start();

//Posts in Datenbank schreiben
$post = $_POST["post"];
$channel =$_POST["channel"];
$username = $_SESSION["username"];

$pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
$sql = "INSERT INTO posts (username, channel, post) VALUES (?, ?, ?)";
$statement = $pdo->prepare($sql);
$statement->execute(array("$username", "$channel", "$post"));


