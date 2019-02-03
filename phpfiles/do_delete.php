<?php

session_start();
include '../passwords/db.php';

$username = $_SESSION['username'];
$id = htmlentities($_GET['id'], ENT_QUOTES);


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);
$sql = "DELETE FROM posts WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':id' => $id));

header("Location: ../Benutzerprofil.php")


?>