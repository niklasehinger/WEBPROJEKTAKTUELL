<?php

session_start ();
include 'passwords/db.php';

$suche = htmlentities($_GET['searchbox'], ENT_QUOTES);
$username = $_SESSION['username'];

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);
$sql_statement = "SELECT * FROM users WHERE username=:username";

$statementcheck = $pdo->prepare($sql_statement);
$statementcheck -> execute(array(":username" => "$username"));

$row = $statementcheck -> fetchObject();


$statement = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$statement->execute(array($suche));
$anzahl_user = $statement->rowCount();

if($suche == $row -> username){

    header ("Location: Benutzerprofil.php");

}

elseif ($anzahl_user > 0) {
    header ("Location: andererprofile.php?usernameandere=$suche");

} else {
    header ("Location: index.php?seite=nichtvergeben");
}

?>