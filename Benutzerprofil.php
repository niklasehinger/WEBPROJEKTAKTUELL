<?php
session_start();
$username = $_SESSION['username'];



include 'passwords/db.php';
include 'header.php';
?>



<div id="container" align="center">

            <?php

            $pdo = new PDO($dsn, $dbuser, $dbpass, $option);

            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            } else {
                echo"Bitte zuerst  <a href=\"start.php\">einloggen</a>";
                die();
            }


            $statement = $pdo->prepare("SELECT * FROM users WHERE username =:username");
            $statement->execute(array(":username"=>"$username"));
            $query = $pdo->prepare($sql);
           

            while($row = $statement->fetch()) {
                $bildlink = $row['pb'];

                echo "<div class=\"profil\" align=\"center\" >";
                echo $row['vorname']." ".$row['nachname']."<br /><br />";
                echo "Studiengang: ".$row['studiengang']."<br /><br />";
                echo "<div class=\"profilbild\" align=\"center\" >";
                echo "<img src='profilbild/$bildlink'><br>";
                echo "</div>";
                echo "<button type='submit'><img src='pictures/icons/cogwheel-setting-2.png' id='updatebutton' align='top' ></button>";
                echo "<button type='submit'><img src='pictures/icons/cogwheel-setting-2.png' id='upload_bild' align='top' ></button>";
                echo "</div>";
                echo "Meine Beiträge: <br /><br />";
            }

            ?>


                <?php

                $pdo = new PDO($dsn, $dbuser, $dbpass, $option);
                $statement = $pdo->prepare("SELECT * FROM posts WHERE author = :username");
                $statement->execute(array(":username"=>"$username"));
                while ($row = $statement->fetch()) {
                    echo $row['content'] . " <br /><br />";
                }
                ?>
</div>

<div>
    <form id="upload_probilbild" method="post" action="phpfiles/do_upload_profilbild.php" enctype="multipart/form-data">
        Profilbild aktualisieren: <input type="file" name="profilbild">
        <input type="submit" name="submit" value="Upload">
    </form>
</div>

<br><br>
<div class ="container-fluid">
    <form id="update_benutzerprofil" method="post" action="phpfiles/do_update_Benutzerprofil.php">
            <div class="input-group" align="center">
                <button type="button" class="btn" data-toggle="modal" data-target="#myModal" name="update_user"  >Update</button>
            </div>
    </form>

    </form>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Bearbeite dein Benutzerprofil</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="input-group mb-3 align="center">
                <div class="input-group-prepend">
                    <span class="input-group-text">Vorname</span>
                    <input type="text" name="vorname">
                </div>
                <div class="input-group mb-3 align="center">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nachname</span>
                    <input type="text" name="nachname">
                </div>
                <div class="input-group mb-3 align="center">
                <div class="input-group-prepend">
                    <span class="input-group-text">Studiengang</span>
                    <input type="text" name="nachname">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>

</body>
<script>
    $(document).ready (function(){
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