<?php
session_start();
$username = $_SESSION['username'];
include 'passwords/db.php';
include 'header.php';


$pdo = new PDO($dsn, $dbuser, $dbpass, $option);



if ($_GET["seite"]=="zugroß"){
    echo "<script type='text/javascript'>Swal.fire(                                        
  'Dateigröße',                                                                            
  'Die Datei darf Maximal 5Mb groß sein',                                                  
  'error');</script>";}

if ($_GET["seite"]=="uploadfehlgeschlagen"){
    echo "<script type='text/javascript'>Swal.fire(                                        
  'Uups',                                                                                  
  'Da ist was kleines schiefgalaufen, probiers einfach nochmal, aber anders',              
  'error');</script>";}

  if ($_GET["seite"]=="fehlerhaftedatei"){
      echo "<script type='text/javascript'>Swal.fire(                                      
    'Eingabefehler',                                                                       
    'Das Dateiformat wird leider nicht unterstützt.',                                      
    'error');</script>";}

?>

<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col-sm-4" style="background-color: whitesmoke; padding: 30px;">
            <h2>Mein Profil</h2><br>
            <div class="profil">
                <?php
                $statement = $pdo->prepare("SELECT * FROM users WHERE username =:username");
                $statement->execute(array(":username" => "$username"));
                $query = $pdo->prepare($sql);

                while ($row = $statement->fetch()) {
                    $bildlink = $row['pb'];

                        if ($row['pb']==NULL){
                            echo "<div class=\"profilbild\"> </div>";
                            echo "<img src='profilbild/root.jpg' class='rounded-circle img-fit' width=\"120\" height=\"120\" ><br><br>";
                            echo "</div>";
                            echo "<div class=\"profil\">";
                            echo $row['vorname'] . " " . $row['nachname'] . "<br><br>";
                            echo "<h6> Studiengang: </h6>" . $row['studiengang'] . "<br><br>";
                            echo "<h6> Email: </h6>" .$row['email'] . "<br/><br/>";

                        } else{ echo "<div class=\"profilbild\"> </div>";
                            echo "<img src='profilbild/$bildlink' class='rounded-circle img-fit' width=\"120\" height=\"120\" ><br><br>";
                            echo "</div>";
                            echo "<div class=\"profil\">";
                            echo "<h4>";
                            echo $row['vorname'] . " " . $row['nachname'] . "<br>";
                            echo "</h4>";
                            echo "<h6> Studiengang: </h6>" . $row['studiengang'] . "<br><br>";
                            echo "<h6> Email: </h6>" .$row['email'] . "<br/><br/>";

                    }
                }


                ?>
            </div>
            <div>
                <button type="button" class="btn btn-secondary" style="background-color: #0068ff" data-toggle="modal"
                        data-target="#myModal">Profil bearbeiten
                </button>

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Bearbeite dein Profil</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form class="py-lg-5" id="update_benutzerprofil" method="post"
                                      action="phpfiles/do_update_Benutzerprofil.php">
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
                                         <button type="submit" class="btn btn-secondary" style='background-color: #0068ff' name="submit" value="Upload">Update</button>
                                     </div>
                                 </form>
                                 <form class="py-lg-5" id="upload_probilbild" method="post" action="phpfiles/do_upload_profilbild.php" enctype="multipart/form-data">
                                     <div class="form-group">
                                         <label for="input2">Profilbild aktualisieren:</label>
                                         <input type="file" class="form-control" name="profilbild" required>
                                     </div>

                                    <div class="input-group">
                                        <button type="submit" class="btn btn-secondary"
                                                style='background-color: #0068ff' name="submit" value="Upload">Update
                                        </button>
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
            $statement = $pdo->prepare("SELECT * FROM posts WHERE author = :username ORDER BY created_on DESC ");
            $statement->execute(array(":username" => "$username"));

            while ($row = $statement->fetch()) {

                $bildlink = $row['bild_id'];
                $pb = $row['pb'];
                $post_id = $row['id'];

                if ($row['content'] == NULL) {

                    echo "<div class=\"row featurette form-rounded text-center postings-margin\" style='background-color:whitesmoke'>
                        <div class=\"col-md-9 order-md-2\" style='background-color:whitesmoke'>
                            <a href='bildupload/$bildlink' class=\"lead float-left img-fit\"><img src='bildupload/$bildlink' width='40%' height=''></a>
                            <div>
                                
                                    <button>
                                     <a href='phpfiles/do_delete.php?id=$post_id' type=submit>DELETE</a>
                                     </button>
                               
                            </div>
                        </div>
                        
                    <div class=\"col-md-3 order-md-1 text-center postings-padding\" style='background-color: transparent; padding: 7px;'>
                          
                        <h5 class=\"bold \" style='padding-left: 10px'>" . $row['author'] . "</h5>
                    </div>
                    </div>
                <br><br>
            ";
                } else {
                    echo "<div class=\"row featurette form-rounded text-center postings-margin\"  style='background-color:whitesmoke'>                                                                                                               
                       <div class=\"col-md-9 order-md-2\">                                                                                                         
                            <p class=\"lead\" style='padding: 25px'>" . $row['content'] . "</p>
                            <div>                               
                                    <button class='btn btn-default'>
                                     <a href='phpfiles/do_delete.php?id=$post_id' type=submit>Delete</a>
                                     </button>                               
                            </div>
                       </div>     
                                                                                                                                                                                             
                   <div class=\"col-md-3 order-md-1 text-center postings-padding\" style='background-color: transparent; padding: 7px'>                                                                       
                                                                                                                                                                                                  
                       <h5 class=\"bold \" style='padding-left: 10px'>" . $row['author'] . "</h5>                                                                                                       
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