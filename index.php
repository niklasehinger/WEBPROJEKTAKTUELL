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


<div class="container"

<?php


$pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
$sql = "SELECT * FROM posts WHERE author = ANY (SELECT * FROM users WHERE username=author) ORDER BY created_on DESC";
$query = $pdo->prepare($sql);
$query->execute();

while ($row = $query->fetch()) {

    $bildlink = $row['bild_id'];
    $pb = $row['pb'];


    echo "<div class='featurette-divider'>";
    echo "<div class='col-md-7 order-md-2'>";
    echo "<p>" . $row['content'] . "</p>";
    echo "</div>";
    echo "<div class='ol-md-5 order-md-1'>";
    echo "<p>" . $row['author'] . "</p>";
    echo "<a href='profilbild/$pb'><img src='profilbild/$pb'>";
    echo "</div>";
    echo "</div>";


}
?>

</div>

</body>

</html>

