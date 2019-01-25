<?php
session_start();


include 'passwords/db.php';
include 'header.php';
?>

<!--<header class="masthead bg-primary text-white text-center">
    <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="img/profile.png" alt="">
        <h1 class="text-uppercase mb-0">Start Bootstrap</h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">Web Developer - Graphic Artist - User Experience Designer</h2>
    </div>
</header>-->
<div class="container jumbotron jumbotron-fluid text-white">
    <header style="color: black; text-decoration: underline;" class="parallax text-white text-center size">
        <div class="feed" align="center" style="margin-top: 200px">
            <div class="create_post col-md-5" align="center">
                <form action="phpfiles/do_post.php" method="post">
                    <textarea class="form-control form-rounded" rows="2" placeholder="Was gibts neues?"
                              name="post"></textarea><br>
                    <input type="submit" value="Posten" name="submit" class="btn btn-primary"
                           style="background-color:#0068ff">
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
                                        <input type="file"  name="file">
                                        <input type="submit" value="Bild posten" name="submit" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </header>
</div>


<div class="container">


    <?php


    $pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM posts JOIN users ON author = username ORDER BY created_on DESC";
    $query = $pdo->prepare($sql);

    $query->execute();

    while ($row = $query->fetch()) {

        $bildlink = $row['bild_id'];
        $pb = $row['pb'];

        echo " 

                <div class=\"row featurette\" style='background-color: #0068ff'>
                    <div class=\"col-md-7 order-md-2\" style='background-color: white'>
                        <p class=\"lead\">" . $row['content'] ."</p>
                        <a href='bildupload/$bildlink' class=\"lead\"><img src='bildupload/$bildlink' width='200px' height='200px'></a>
                    </div>
                <div class=\"col-md-5 order-md-1\">
                        <p class=\"lead\">" . $row['author'] ."</p>
                    <a href=\"andererprofile.php?usernameandere=".$row['author']."\">    
                    <img class=\"content img-fluid mx-auto\" data-src=\"holder.js/500x500/auto\" alt=\"500x500\"
                         src='profilbild/$pb'
                         data-holder-rendered=\"true\" style=\"width: 200px; height: 200px;\">
                     </a>    
                </div>
                </div>
                <br><br>
            "; }
    ?>

</div>


</body>

</html>

