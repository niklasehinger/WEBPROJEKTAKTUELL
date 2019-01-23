<?php
session_start();


if(!isset($_SESSION['username'])) {
    echo"Bitte zuerst <a href='start.php'>einloggen</a>";
    die();
}

include 'passwords/db.php';
include 'header.php';

$usernameandere = $_GET ["usernameandere"];
$username = $_SESSION ["username"];
$_SESSION ["usernameandere"] = $usernameandere;

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);


$statement = $pdo->prepare("SELECT * FROM users WHERE username = '$usernameandere'");
$statement->execute(array($usernameandere));
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
                $statement = $pdo->prepare("SELECT * FROM posts WHERE author = '$usernameandere'");
                $statement->execute(array($usernameandere));
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


        <div style="margin-top: 300px">
            <form id="update_benutzerprofil" method="post" action="phpfiles/do_update_Benutzerprofil.php">
                <div class="input-group">
                    <label>Vorname</label>
                    <input type="text" name="vorname">
                </div>
                <div class="input-group">
                    <label>Nachname</label>
                    <input type="text" name="nachname" required>
                </div>
                <div class="input-group">
                    <label>Studiengang</label>
                    <input type="text" name="studiengang" required>
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group">
                    <label>s Beiträge</label>
                    <input type="text" name="beitraege" required>
                </div>

                <div class="input-group">
                    <button type="submit" class="btn" name="update_user">Update</button>
                </div>
            </form>
        </div>

        <div>

            <form id="upload_probilbild" method="post" action="phpfiles/do_upload_profilbild.php"
                  enctype="multipart/form-data">
                <input type="file" name="profilbild">
                <button type="submit" name="submit">Profilbild aktualisieren</button>

            </form>
        </div>


</body>
<script>
    $(document).ready(function () {
        $('#update_benutzerprofil').hide();
        $('#upload_probilbild').hide();
    });

    $(function () {
        $('#updatebutton').click(function () {
            $('#update_benutzerprofil').show();


        });
    });

    $(function () {
        $('#upload_bild').click(function () {
            $('#upload_probilbild').show();


        });
    });




</script>

</html>