
<?php



$username = $_POST["username"];
$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$email = $_POST["email"];
$passwort = $_POST["passwort"];

var_dump($username);
var_dump($vorname);
var_dump($nachname);
var_dump($email);
var_dump($passwort);


//$_SESSION ["username"]="$username";
//$_SESSION ["vorname"]="$vorname";
//$_SESSION ["nachname"]="$nachname";
//$_SESSION ["email"]="$email";
//$_SESSION ["passwort"]="$passwort";

include ("./passwords/db.php");

//Daten werden in Datenbank geschrieben

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);
$sql = "INSERT INTO users (username, vorname, nachname, email, passwort) VALUES (?, ?, ?, ?, ?)";
$statement = $pdo->prepare($sql);
$statement->execute(array("$username", "$vorname", "$nachname", "$email", "$passwort"));
$row = $statement->fetchObject();
?>



