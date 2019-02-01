<?php

session_start ();
include '../passwords/db.php';

$username = $_SESSION['username'];
$id = $_GET["id"];

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);
$sql = "DELETE FROM posts WHERE id=:id";
$stmt=$pdo->prepare($sql);
$stmt->execute(array( ':id'=>$id));

header("Location: ../Benutzerprofil.php")


?>