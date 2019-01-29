<?php
session_start();


include 'passwords/db.php';
include 'header.php';

$usernameandere = $_GET ["usernameandere"];
$username = $_SESSION ["username"];
$_SESSION ["usernameandere"] = $usernameandere;

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);


$statement = $pdo->prepare("SELECT * FROM users WHERE username =:usernameandere");
$statement->execute(array("usernameandere" => "$usernameandere"));
while ($row = $statement->fetch()) {

?>
<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col-sm-4" style="background-color: whitesmoke; padding: 30px;">
            <h2><?php echo $row['vorname'] . " " . $row['nachname'] ?>s Profil</h2><br>
                <div class="profil">
                    <div id="main">
                        <?php
                        $bildlink = $row['pb'];
                        echo "<div class=\"profilbild\">";
                        echo "<img src='profilbild/$bildlink' height='120' width='120'><br><br>";
                        echo "</div>";
                        echo $row['vorname'] . " " . $row['nachname'] . "<br /><br />";
                        echo "Studiengang: " . $row['studiengang'] . "<br /><br />";
                        echo $row['email'] . "<br /><br />";


                        $statement = $pdo->prepare("SELECT usernameandere FROM following WHERE (usernameandere =:usernameandere AND username=:username)");
                        $statement->execute(array(":username" => "$username", ":usernameandere" => "$usernameandere"));
                        $row = $statement->fetch();
                        if ($usernameandere == $row['usernameandere']) {
                        echo "<button id=\"entfolgen\" onclick=\"location.href='do_entfolgen.php'\" type=\"submit\" class=\"btn btn-secondary\" style='background-color: #0068ff'>Entfolgen</button><br>";
                        } else {
                            echo "<button id=\"folgen\" onclick=\"location.href='do_folgen.php'\" type=\"submit\" class=\"btn btn-secondary\" style='background-color: #0068ff'>Folgen</button><br>";
                        }

                        }
                        ?>
                    </div>
                </div>
        </div>
            <div class="col-sm-8" style="padding: 40px;">
                <?php
                $statement = $pdo->prepare("SELECT * FROM users WHERE username =:usernameandere");
                $statement->execute(array("usernameandere" => "$usernameandere"));
                while ($row = $statement->fetch()) {
                    echo "<h4>Beiträge von " . $row['vorname'] . ":</h4><br/>";
                }
                ?>

                <?php
                $statement = $pdo->prepare("SELECT * FROM posts WHERE author =:usernameandere ORDER BY created_on DESC ");
                $statement->execute(array("usernameandere" => "$usernameandere"));

                while ($row = $statement->fetch()) {

                    $bildlink = $row['bild_id'];
                    $pb = $row['pb'];

                    if ($row['content'] == NULL) {

                        echo " <hr class=\"featurette-divider\">
 
                        <div class=\"row featurette\" style='background-color: #0068ff'>
                        <div class=\"col-md-7 order-md-2\" style='background-color: white'>
                            <a href='bildupload/$bildlink' class=\"lead\"><img src='bildupload/$bildlink' width='200px' height='200px'></a>
                        </div>
                    <div class=\"col-md-5 order-md-1\">
                        <p class=\"lead\">" . $row['author'] . "</p>
                    </div>
                    </div>
                <br><br>
            ";
                    } else {
                        echo " <hr class=\"featurette-divider\">
 
 <div class=\"row featurette\" style='background-color: #0068ff'>
                        <div class=\"col-md-7 order-md-2\" style='background-color: white'>
                            <p class=\"lead\">" . $row['content'] . "</p>
                        </div>
                    <div class=\"col-md-5 order-md-1\">
                        <p class=\"lead\">" . $row['author'] . "</p> 
                    </div>
                    </div>
                <br><br>
            ";
                    }
                }
                ?>
            </div>
        </div>
</div>


</body>

</html>