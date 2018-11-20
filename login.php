<?php
session_start();


$username = $_POST["username"];
$passwort = $_POST["passwort"];

$_SESSION["username"] = $username;
$_SESSION["passwort"] = $passwort;

include './passwords/db.php';

$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql = "SELECT passwort FROM user WHERE username=:username";
$statement = $pdo->prepare($sql);
$statement->execute(array(":username"=>"$username"));
$row = $statement->fetchObject();
if ($passwort == $row->passwort) {
    $_SESSION["log"] = "TRUE";
    header("Location: start.php");
} else {
    $_SESSION["log"]="FALSE";
    header("Location: index.html");
}
?>


