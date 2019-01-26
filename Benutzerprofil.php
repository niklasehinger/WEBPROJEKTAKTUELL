<?php
session_start();
$username = $_SESSION['username'];
include 'passwords/db.php';
include 'header.php';


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);

?>

<div class="container" style="margin-top: 40px;">
    <div class="row">
         <div class="col-sm-4" style="background-color: whitesmoke; padding: 30px;">
             <h2>Mein Profil</h2><br>
                <div class="fakeimg">
                    <?php
                    $statement = $pdo->prepare("SELECT * FROM users WHERE username =:username");
                    $statement->execute(array(":username" => "$username"));
                    $query = $pdo->prepare($sql);

                    while ($row = $statement->fetch()) {
                        $bildlink = $row['pb'];
                        echo "<div class=\"profilbild\"> </div>";
                        echo "<img src='profilbild/$bildlink' class='rounded-circle' width=\"120\" height=\"120\" ><br><br>";
                        echo "</div>";
                        echo "<div class=\"profil\">";
                        echo $row['vorname'] . " " . $row['nachname'] . "<br><br>";
                        echo "Studiengang: " . $row['studiengang'] . "<br><br>";
                        echo $row['email'] . "<br/><br/>";
                    }
                    ?>
                </div>
             <div>
                 <!-- Trigger the modal with a button -->
                 <button type="button" class="btn btn-secondary" style="background-color: #0068ff" data-toggle="modal" data-target="#myModal" >Profil bearbeiten</button>

                 <!-- Modal -->
                 <div id="myModal" class="modal fade" role="dialog">
                     <div class="modal-dialog">

                         <!-- Modal content-->
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h4>Bearbeite dein Profil</h4>
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
                                         <button type="submit" class="btn" style="background-color: lightgrey" name="submit" value="Update">Update</button>
                                     </div>
                                 </form>
                                 <form class="py-lg-5" id="upload_probilbild" method="post" action="phpfiles/do_upload_profilbild.php" enctype="multipart/form-data">
                                     <div class="form-group">
                                         <label for="input2">Profilbild aktualisieren:</label>
                                         <input type="file" class="form-control" name="profilbild" required>
                                     </div>

                                     <div class="input-group">
                                         <button type="submit" class="btn btn-secondary" style='background-color: #0068ff' name="submit" value="Upload">Update</button>
                                     </div>

                                 </form>
                             </div>
                         </div>

                     </div>
                 </div>

             </div>
         </div>
        <div class="col-sm-8" style="padding: 40px;">
            <h4> Meine Beiträge:</h4>
            <br>
            <?php

            $pdo = new PDO($dsn, $dbuser, $dbpass, $option);
            $statement = $pdo->prepare("SELECT * FROM posts WHERE author = :username");
            $statement->execute(array(":username" => "$username"));
            while ($row = $statement->fetch()) {
                echo $row['content'] . " <br/><br/>";
            }
            ?>


        </div>

    </div>



</div>
<!--
<h2>Mein Profil</h2><br>

<?php
/*$statement = $pdo->prepare("SELECT * FROM users WHERE username =:username");
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
*/?>

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Update Profil</button>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

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
--><?php
/*
$pdo = new PDO($dsn, $dbuser, $dbpass, $option);
$statement = $pdo->prepare("SELECT * FROM posts WHERE author = :username");
$statement->execute(array(":username" => "$username"));
while ($row = $statement->fetch()) {
    echo $row['content'] . " <br /><br />";
}
*/?>


