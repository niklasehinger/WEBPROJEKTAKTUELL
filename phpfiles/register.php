
<?php

session_start();

$username = htmlentities($_POST['username'], ENT_QUOTES);
$vorname = htmlentities($_POST['vorname'], ENT_QUOTES);
$nachname = htmlentities($_POST['nachname'], ENT_QUOTES);
$email = htmlentities($_POST['email'], ENT_QUOTES);
$passwort = htmlentities($_POST['passwort'], ENT_QUOTES);
$studiengang = htmlentities($_POST['studiengang'], ENT_QUOTES);


$_SESSION ["username"]="$username";



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
    header("Location: ../start.php?seite=username");
}  else {

    //Daten in die Datenbank schreiben
    $pdo = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "INSERT INTO users (username, vorname, nachname, studiengang, email, passwort) VALUES (?, ?, ?, ?, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->execute(array("$username", "$vorname", "$nachname", "$studiengang", "$email", "$hash"));
    $row = $statement->fetchObject();
    $_SESSION["log"] = "TRUE";
    header("Location: ../index.php");
}



?>
