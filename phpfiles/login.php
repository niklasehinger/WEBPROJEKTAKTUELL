<?php

session_start();

include '../passwords/db.php';

$username = $_POST["username"];
$passwort = $_POST["passwort"];

$_SESSION["username"]="$username";

$options = [
    'cost' => 12
];
$hash = password_hash($passwort, PASSWORD_DEFAULT, $options);


$pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
$sql = "SELECT passwort FROM users WHERE username=:username";
$statement = $pdo->prepare($sql);
$statement->execute(array(":username" => "$username"));
$row = $statement->fetchObject();
if (password_verify($passwort, $hash)) {
    $_SESSION["log"] = "TRUE";
    header("Location: ../index.php");
} else {
    $_SESSION["log"] = "FALSE";
    header("Location: ../errors/start errorlogin.php");
}





