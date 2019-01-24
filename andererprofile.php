<?php
session_start();


include 'passwords/db.php';
include 'header.php';

$usernameandere = $_GET ["usernameandere"];
$username = $_SESSION ["username"];
$_SESSION ["usernameandere"] = $usernameandere;

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);


$statement = $pdo->prepare("SELECT * FROM users WHERE username =:usernameandere");
$statement->execute(array("usernameandere"=>"$usernameandere"));
while ($row = $statement->fetch()) {

?>

<div id="main" align="center" style="width:100%; height:100%">
    <h1><?php echo $row['vorname'] . " " . $row['nachname'] ?>s Daten</h1>
    <div class="profil" align="center">
        <div id="main" align="center" style="width:100%; height:100%">
            <?php
            $bildlink = $row['pb'];

            echo $row['vorname'] . " " . $row['nachname'] . "<br /><br />";
            echo "<div class=\"profilbild\" align=\"center\" >";
            echo "<img src='profilbild/$bildlink'><br>";
            echo "</div>";
            echo "Studiengang: " . $row['studiengang'] . "<br /><br />";
            echo "E-Mail: " . $row['email'] . "<br /><br />";
            echo "Fakultät: " . $row['fakultaet'] . "<br /><br />";
            echo $row['vorname'] . " " . $row['nachname'] . "s Beiträge:<br /><br />"; }
            ?>

            <p>
                <?php
                $statement = $pdo->prepare("SELECT * FROM posts WHERE author =:usernameandere");
                $statement->execute(array("usernameandere"=>"$usernameandere"));
                while ($row = $statement->fetch()) {
                    echo $row['content'] . " <br /><br />";
                }
                ?>
            </p>


            <?php
            $statement = $pdo->prepare("SELECT usernameandere FROM following WHERE (usernameandere =:usernameandere AND username=:username)");
            $statement-> execute(array(":username"=>"$username",":usernameandere"=>"$usernameandere"));
            $row = $statement->fetch();
            if ($usernameandere == $row['usernameandere']){
                echo "<button id=\"entfolgen\" onclick=\"location.href='do_entfolgen.php'\" type=\"submit\" class=\"btn btn-secondary\">Entfolgen</button>";
            }
            else {
                echo "<button id=\"folgen\" onclick=\"location.href='do_folgen.php'\" type=\"submit\" class=\"btn btn-secondary\">Folgen</button>";
            }
            ?>
        </div>
    </div>
</div>


</body>

</html>