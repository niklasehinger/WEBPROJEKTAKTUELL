<?php

include '../passwords/db.php';
session_start();

$post = htmlentities($_POST['post'], ENT_QUOTES);
$username = $_SESSION["username"];


$pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
$sql = "INSERT INTO posts (author, content,gelesen) VALUES (?, ?, 0)";
$statement = $pdo->prepare($sql);
$statement->execute(array("$username", "$post"));


header("Location: ../index.php");

