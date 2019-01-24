<?php

session_start();

include '../passwords/db.php';

$username = $_POST["username"];
$passwort = $_POST["passwort"];
$_SESSION["username"] = $username;
$_SESSION["passwort"] = $passwort;


$pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
$sql = "SELECT passwort FROM users WHERE username=:username";

$statement = $pdo->prepare($sql);
$statement->execute(array(":username" => "$username"));
$row = $statement->fetchObject();


if (password_verify($passwort, $row->passwort)) {
    $_SESSION["log"] = "TRUE";
    header("Location: ../index.php");
} else {
    session_destroy();
    header("Location: ../start.php?seite=falsch");
}

if (!$statement){
    echo "Datenbakfehler";
}




