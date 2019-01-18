<?php
session_start();


if(!isset($_SESSION['username'])) {
    echo"Bitte zuerst <a href='start.php'>einloggen</a>";
    die();
}

include 'passwords/db.php';
include 'header.php';
?>
<div class="container">
    <div style="color: black; text-decoration: underline;" class="parallax">
        <div class="feed" align="center">
            <div class="create_post" align="center">
                <form action="phpfiles/do_post.php" method="post">
                    <textarea placeholder="Was gibts neues?" name="post" style="margin-top: 30px" cols="100"
                              rows="4"></textarea> <br>
                    <input type="submit" value="Posten" name="submit">
                </form>
                <br>
                <form action="phpfiles/do_bildupload.php" method="post" enctype="multipart/form-data">
                    <input type="submit" value="Bild posten" name="submit">
                    <input type="file" name="file" style="margin-bottom: 10px">
                </form>
            </div>
        </div>
    </div>
</div>

<div id="container" align="center" style="width:100%; height:100%; float:">
    <div id="feed" align="center" style="width: 50%; height: 50%;">



        <?php

        $pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
        $sql = "SELECT * FROM posts ORDER BY created_on DESC";
        $query = $pdo->prepare($sql);
        $query -> execute();






        while ($row = $query->fetch()){
            $bildlink = $row['bild_id'];

            echo "<div class=\"postings\" align=\"center\" style=\"background-color: black;\">";
            echo "<div class=\"content\" style=\"background-color: #2b4046; width: 30%;\">";
            echo "<p>".$row['author']."</p>";
            echo "</div>";
            echo "<div class=\"content\" style=\"background-color: white; width: 70%\">";
            echo "<p>".$row['content']."</p>"."</br>";
            echo "<a href='bildupload/$bildlink'><img class='bild' src='bildupload/$bildlink' style='max-width: 100%'; height='auto'>";
            echo "</div>";
            echo "</div>";

        }

        ?>

    </div>
</div>

</body>

</html>

