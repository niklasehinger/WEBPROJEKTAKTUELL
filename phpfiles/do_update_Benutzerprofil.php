<?php

include '../passwords/db.php';
session_start();

$post = $_POST["post"];
$username = $_SESSION["username"];

$pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
$sql = "INSERT INTO posts (author, content) VALUES (?, ?)";
$statement = $pdo->prepare($sql);
$statement->execute(array("$username", "$post"));


header("Location: ../index.php");

