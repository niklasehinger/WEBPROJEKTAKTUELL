<?php

session_start();

$fakultät = $_POST["fakultät"];
$studiengang = $_POST["studiengang"];
$semester = $_POST["semester"];
$job = $_POST["job"];

$_SESSION ["username"]="$username";


include("../passwords/db.php");


    //Daten in die Datenbank schreiben
    $pdo = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "UPDATE users SET fakultät = '$fakultät', studiengang = '$studiengang', semester = '$semester', arbeitgeber = '$job' WHERE username = '$username'";
    $statement = $pdo->prepare($sql);
    $statement->execute(array("$fakultät", "$studiengang", "$semester", "$job"));
    $row = $statement->fetchObject();
    $_SESSION["log"] = "TRUE";
    header("Location: ../startlogin.php");

?>