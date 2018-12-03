
<?php

session_start();

$username = $_POST["username"];
$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$email = $_POST["email"];
$passwort = $_POST["passwort"];


$_SESSION ["id"]="$id";

include ("passwords/db.php");
include("../passwords/db.php");

//Passwort hashen
$options = [
    'cost' => 5
];
$hash = password_hash($passwort, PASSWORD_DEFAULT, $options);

//Checken ob Username bereits vergeben ist
$pdocheck = new PDO($dsn, $dbuser, $dbpass, $option);
$sql_statement = "SELECT username FROM users WHERE username=:username";

$statementcheck = $pdocheck->prepare($sql_statement);
$statementcheck -> execute(array(":username" => "$username"));

$row = $statementcheck -> fetchObject();

if ($username == $row->username){
    session_destroy();
    header("Location: errors/start errorusername.php");
}  else {

    //Daten in die Datenbank schreiben
    $pdo = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "INSERT INTO users (username, vorname, nachname, email, passwort) VALUES (?, ?, ?, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->execute(array("$username", "$vorname", "$nachname", "$email", "$hash"));
    $row = $statement->fetchObject();
    $_SESSION["log"] = "TRUE";
    header("Location: startlogin.php");
}

?>