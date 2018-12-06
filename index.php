<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "Fehler";
    echo"Bitte zuerst <a href=\"start.php\">einloggen</a>";
    die();
}

include 'header.html';
include 'passwords/db.php';
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" >

    <style>
        .parallax {
            /* Hintergrundbild */
            background-image: url("./pictures/wald.jpg");

            min-height: 300px;

            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .#container{
            background-image: url("pictures/workspace.jpg");
        }
    </style>

    <title>Pigeon inc.</title>
</head>
<body>

<div style="color: #fff; text-decoration: underline;" class="parallax">
    <div class="feed" align="center">
        <div class="posttext" align="center">
            <form method="post" enctype="multipart/form-data" action="phpfiles/do_post.php">
                <textarea class="status" name="post" placeholder="Write your post here!" rows="4" cols="50"></textarea><br>
                <button type="submit" class="postbutton" name="create_post">posten</button>
            </form>
            <form method="post" enctype="multipart/form-data" action="phpfiles/do_bildupload.php">
                <input type="file" name="file">
                <button type="submit" class="bildupload" name="create_post">posten</button>
            </form>
        </div>
    </div>
</div>

<div id="container" style="width:100%; height:100%">
    <div class="postings" align="center" style="background-color: black">
        <?php
        $pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
        $sql = "SELECT content, author FROM posts";
        foreach ($pdo->query($sql) as $row) {
            echo $row['content']." ".$row['author']."<br/><br/>";
        }
        ?>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>

