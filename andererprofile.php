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
                    <?php

                    $bildlink = $row['pb'];

                    if ($row['pb']==NULL){
                        echo "<div class=\"profilbild\"> </div>";
                        echo "<img src='profilbild/root.jpg' class='rounded-circle img-fit' width=\"120\" height=\"120\" ><br><br>";
                        echo "</div>";
                        echo "<div class=\"profil\">";
                        echo $row['vorname'] . " " . $row['nachname'] . "<br><br>";
                        echo "<h6> Studiengang: </h6>" . $row['studiengang'] . "<br><br>";
                        echo "<h6> Email: </h6>" .$row['email'] . "<br/><br/>";



                        $statement = $pdo->prepare("SELECT usernameandere FROM following WHERE (usernameandere =:usernameandere AND username=:username)");
                        $statement->execute(array(":username" => "$username", ":usernameandere" => "$usernameandere"));
                        $row = $statement->fetch();
                        if ($usernameandere == $row['usernameandere']) {
                            echo "<button id=\"entfolgen\" onclick=\"location.href='do_entfolgen.php'\" type=\"submit\" class=\"btn btn-secondary\" style='background-color: #0068ff'>Entfolgen</button><br>";
                        } else {
                            echo "<button id=\"folgen\" onclick=\"location.href='do_folgen.php'\" type=\"submit\" class=\"btn btn-secondary\" style='background-color: #0068ff'>Folgen</button><br>";
                        }

                    } else{ echo "<div class=\"profilbild\"> </div>";
                        echo "<img src='profilbild/$bildlink' class='rounded-circle img-fit' width=\"120\" height=\"120\" ><br><br>";
                        echo "</div>";
                        echo "<div class=\"profil\">";
                        echo "<h4>";
                        echo $row['vorname'] . " " . $row['nachname'] . "<br>";
                        echo "</h4>";
                        echo "<h6> Studiengang: </h6>" . $row['studiengang'] . "<br><br>";
                        echo "<h6> Email: </h6>" .$row['email'] . "<br/><br/>";

                        $statement = $pdo->prepare("SELECT usernameandere FROM following WHERE (usernameandere =:usernameandere AND username=:username)");
                        $statement->execute(array(":username" => "$username", ":usernameandere" => "$usernameandere"));
                        $row = $statement->fetch();
                        if ($usernameandere == $row['usernameandere']) {
                            echo "<button id=\"entfolgen\" onclick=\"location.href='do_entfolgen.php'\" type=\"submit\" class=\"btn btn-secondary\" style='background-color: #0068ff'>Entfolgen</button><br>";
                        } else {
                            echo "<button id=\"folgen\" onclick=\"location.href='do_folgen.php'\" type=\"submit\" class=\"btn btn-secondary\" style='background-color: #0068ff'>Folgen</button><br>";
                        }

                    }}
                    ?>
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

                    echo "<div class=\"row featurette form-rounded text-center postings-margin\" style='background-color:whitesmoke'>
                        <div class=\"col-md-9 order-md-2\" style='background-color:whitesmoke'>
                            <a href='bildupload/$bildlink' class=\"lead float-left img-fit\"><img src='bildupload/$bildlink' width='40%' height=''></a>
                        </div>
                    <div class=\"col-md-3 order-md-1 text-center postings-padding\" style='background-color: transparent; padding: 7px;'>
                        <a href=\"andererprofile.php?usernameandere=" . $row['author'] . "\">    
                            <img class=\"rounded-circle img-fit\" data-src=\"holder.js/500x500/auto\" alt=\"100x100\" src='profilbild/$pb' data-holder-rendered=\"true\" style=\"width: 70px; height: 70px;\">
                        </a>    
                        <h5 class=\"bold \" style='padding-left: 10px'>" . $row['author'] . "</h5>
                    </div>
                    </div>
                <br><br>
            ";
                } else {
                    echo "<div class=\"row featurette form-rounded text-center postings-margin\"  style='background-color:whitesmoke'>                                                                                                               
                       <div class=\"col-md-9 order-md-2\">                                                                                                         
                            <p class=\"lead\" style='padding: 25px'>" . $row['content'] . "</p>
                       </div>                                                                                                                                                                           
                   <div class=\"col-md-3 order-md-1 text-center postings-padding\" style='background-color: transparent; padding: 7px'>                                                                       
                       <a href=\"andererprofile.php?usernameandere=" . $row['author'] . "\">                                                                                                            
                           <img class=\"rounded-circle img-fit\" data-src=\"holder.js/500x500/auto\" alt=\"100x100\" src='profilbild/$pb' data-holder-rendered=\"true\" style=\"width: 70px; height: 70px;\">   
                       </a>                                                                                                                                                                             
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


</body>

</html>