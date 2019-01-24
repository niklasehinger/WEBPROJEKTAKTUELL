<?php
session_start();
$username = $_SESSION['username'];
include 'passwords/db.php';
include 'header.php';


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    echo "Bitte zuerst  <a href=\"start.php\">einloggen</a>";
    die();
}
?>

<div>Mein Profil</div>

<?php
$statement = $pdo->prepare("SELECT * FROM users WHERE username =:username");
$statement->execute(array(":username" => "$username"));
$query = $pdo->prepare($sql);

while ($row = $statement->fetch()) {
    $bildlink = $row['pb'];
    echo "<div class=\"profil\" align=\"center\" >";
    echo $row['vorname'] . " " . $row['nachname'] . "<br /><br />";
    echo "Studiengang: " . $row['studiengang'] . "<br /><br />";
    echo "<div class=\"profilbild\" align=\"center\" > </div>";
    echo "<img src='profilbild/$bildlink'><br>";
    echo "</div>";
}
?>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update Profil</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">Bearbeite dein Profil
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="update_benutzerprofil" method="post" action="phpfiles/do_update_Benutzerprofil.php">
                    Vorname: <input type="text" name="vorname" placeholder="Vorname"><br>
                    Nachname: <input type="text" name="nachname" placeholder="Nachname"><br>
                    Studiengang: <input type="text" name="studiengang" placeholder="Studiengang">
                    <input type="submit" name="submit" value="Update">

                </form>
                <br>
                <form id="upload_probilbild" method="post" action="phpfiles/do_upload_profilbild.php" enctype="multipart/form-data">
                    Profilbild aktualisieren: <input type="file" name="profilbild">
                    <input type="submit" name="submit" value="Upload">
                </form>
            </div>
        </div>

    </div>
</div>

<div> Meine Beiträge:</div>
<?php

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);
$statement = $pdo->prepare("SELECT * FROM posts WHERE author = :username");
$statement->execute(array(":username" => "$username"));
while ($row = $statement->fetch()) {
    echo $row['content'] . " <br /><br />";
}
?>



