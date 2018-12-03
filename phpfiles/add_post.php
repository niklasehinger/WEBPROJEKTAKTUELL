<?php
include '../passwords/db.php';
include '../phpfiles/add_post.php';
session_start();

$author = $_SESSION["username"];
$content = $_POST ["content"];
$posting_time = date_timestamp_get("$content");

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);
$sql = "INSERT INTO posts (username, content) VALUES (?, ?)";
$statement = $pdo->prepare($sql);
$statement->execute(array("$username", "$content", "$posting_time"));
$row = $statement->fetchObject();
$_SESSION["log"] = "TRUE";
header("Location: index.php");

