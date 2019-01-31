<?php
session_start();


include 'passwords/db.php';
include 'header.php';
?>

<?php
if ($_GET["seite"]=="zugroß"){
    echo "<script type='text/javascript'>swal('Die Datei ist zu groß!');</script>";
}

if ($_GET["seite"]=="fehlerhaftedatei"){
    echo "<script type='text/javascript'>swal('Keine oder fehlerhafte Datei erkannt!');</script>";
}

if ($_GET["seite"]=="uploadfehlgeschlagen"){
    echo "<script type='text/javascript'>swal('Ups! Da ist was schief gelaufen...');</script>";
}

if ($_GET["seite"]=="nichtvergeben"){
    echo "<script type='text/javascript'>swal('Benutzername nicht vergeben!');</script>";
}                                                                                      

?>


<div class="container jumbotron jumbotron-fluid">
    <header style="background-color: white;" class="text-center size">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style="background-size: cover">
                <div class="carousel-item active" style="max-width: 100%; height: auto ">
                    <img class="d-block w-100" src="Logos/hdm.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="Logos/hdm2.jpg" alt="Second slide">
                </div>
                <div class="feed" align="center" style="margin-top: 40%">
                    <div class="create_post col-md-5" align="center">
                        <form action="phpfiles/do_post.php" method="post">
                            <textarea class="form-control form-rounded" rows="2" placeholder="Was gibts neues?"
                                      name="post"></textarea><br>
                            <button type="submit" name="submit" class="btn btn-primary bildposten">Posten</button>
                            <button type="button" class="btn btn-primary bildposten" data-toggle="modal"
                                    data-target=".bd-example-modal-sm">Bild posten
                            </button>
                        </form>

                        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
                             aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="create_post margin">
                                        <form action="phpfiles/do_bildupload.php" method="post"
                                              enctype="multipart/form-data">
                                            <input type="file" name="file">
                                            <input type="submit" value="Bild posten" name="submit"
                                                   class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

<div class="container ">


    <?php

    $pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM posts JOIN users ON author = username ORDER BY created_on DESC";
    $query = $pdo->prepare($sql);

    $query->execute();

    while ($row = $query->fetch()) {

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


</body>

</html>

