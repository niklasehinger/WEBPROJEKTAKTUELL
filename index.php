<?php
session_start();


include 'passwords/db.php';
include 'header.php';
?>
<div class="container ">
    <div style="color: black; text-decoration: underline;" class="parallax">
        <div class="feed" align="center">
            <div class="create_post" align="center">
                <form action="phpfiles/do_post.php" method="post">
                    <textarea placeholder="Was gibts neues?" name="post" style="margin-top: 30px"></textarea> <br>
                    <input type="submit" value="Posten" name="submit" class="btn btn-primary"
                           style="background-color:#0068ff">
                </form>
                <form action="phpfiles/do_bildupload.php" method="post" enctype="multipart/form-data">
                    <input type="file" class="btn btn-primary" style="background-color:#0068ff">
                    <input type="submit" value="Bild posten" name="submit" class="btn btn-primary"
                           style="background-color:#0068ff">
                </form>
            </div>

        </div>
    </div>
</div>


<!--<div id="container" align="center" style="width:100%; height:100%; float:">
    <div id="feed" align="center" style="width: 50%; height: 50%;">
-->


<?php

$pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
$sql = "SELECT * FROM posts ORDER BY created_on DESC";
$query = $pdo->prepare($sql);
$query->execute();

$pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
$sql = "SELECT pb FROM users";
$query = $pdo->prepare($sql);
$query->execute();


while ($row = $query->fetch()) {

    $bildlink = $row['bild_id'];
    $pb = $row['pb'];

    echo "<div class=\"postings\" align=\"center\" style=\"background-color: black;\">";
    echo "<div class=\"content\" style=\"background-color: #2b4046; width: 50%;\">";
    echo "<a href='profilbild/$pb'><img class='bild' src='profilbild/$pb' style='max-width: 100%'; height='auto'>";
    echo "<a>" . $row['author'] . "</a>";
    echo "</div>";
    echo "<div class=\"content\" style=\"background-color: white; width: 50%\">";
    echo "<p>" . $row['content'] . "</p>" . "</br>";
    echo "<a href='bildupload/$bildlink'><img class='bild' src='bildupload/$bildlink' style='max-width: 100%'; height='auto'>";
    echo "</div>";
    echo "</div>";

}

?>

</div>
</div>
-->


<div class="container marketing">


    <!-- START THE FEATURETTES -->


    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span>
            </h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
                semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
                commodo.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="content img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
                 src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_168750eeedd%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_168750eeedd%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22185.125%22%20y%3D%22261.1%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                 data-holder-rendered="true" style="width: 200px; height: 200px;">
        </div>
    </div>

    <!-- /END THE FEATURETTES -->

</div>


</body>

</html>

