<?php
session_start();
$username = $_SESSION['username'];
include 'passwords/db.php';
include 'header.php';


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

?>

<h2>Mein Profil</h2><br>

<?php
$statement = $pdo->prepare("SELECT * FROM users WHERE username =:username");
$statement->execute(array(":username" => "$username"));
$query = $pdo->prepare($sql);

while ($row = $statement->fetch()) {
    $bildlink = $row['pb'];
    echo "<div class=\"profil\">";
    echo $row['vorname'] . " " . $row['nachname'] . "<br>";
    echo "Studiengang: " . $row['studiengang'] . "<br>";
    echo $row['email'] . "<br /><br />";
    echo "<div class=\"profilbild\"> </div>";
    echo "<img src='profilbild/$bildlink' width=\"120\" height=\"120\" ><br><br>";
    echo "</div>";
}
?>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Update Profil</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">Bearbeite dein Profil
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="py-lg-5" id="update_benutzerprofil" method="post" action="phpfiles/do_update_Benutzerprofil.php">
                    <div class="form-group">
                        <label for="input2">Vorname</label>
                        <input type="text" class="form-control" name="vorname" required>
                    </div>

                    <div class="form-group">
                        <label for="input2">Nachname</label>
                        <input type="text" class="form-control" name="nachname" required>
                    </div>

                    <div class="form-group">
                        <label for="input4">Studiengang</label>
                        <select type="text" class="form-control" name="studiengang" required>
                            <option>Online-Medien-Management</option>
                            <option>Informationsdesign</option>
                            <option>Wirtschaftsinformatik</option>
                            <option>Audiovisuellemedien</option>
                            <option>Medieninformatik</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <button type="submit"  name="submit" value="Update">Update</button>
                    </div>
                </form>
                <br>
                <form class="py-lg-5" id="upload_probilbild" method="post" action="phpfiles/do_upload_profilbild.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="input2">Profilbild aktualisieren:</label>
                        <input type="file" class="form-control" name="profilbild" required>
                    </div>

                    <div class="input-group">
                        <button type="submit"  name="submit" value="Upload">Update</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<br><br>

<h4> Meine Beiträge:</h4>

<br>
<?php

$pdo = new PDO($dsn, $dbuser, $dbpass, $option);
$statement = $pdo->prepare("SELECT * FROM posts WHERE author = :username");
$statement->execute(array(":username" => "$username"));
while ($row = $statement->fetch()) {
    echo $row['content'] . " <br /><br />";
}
?>


