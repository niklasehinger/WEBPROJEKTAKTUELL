<?php
session_start();


if(!isset($_SESSION['username'])) {
    echo"Bitte zuerst <a href='start.php'>einloggen</a>";
    die();
}

include 'header.html';
include 'passwords/db.php';
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <title>Pigeon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

        div .content{
            height: max-content;
        }

        .parallax {
            /* Hintergrundbild */
            background-image: url("./pictures/wald.jpg");

            min-height: 200px;

            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .content{
            float: left;
            margin-top: 50px;
            padding-top: 10px;
            height: auto;
        }


    </style>

    <title>Pigeon</title>
</head>
<body>

<div style="color: #fff; text-decoration: underline;" class="parallax">
    <div class="feed" align="center">
        <div class="create_post" align="center">
            <form action="phpfiles/do_post.php" method="post">
                <textarea placeholder="Was geht ab?" name="post" style="margin-top: 30px" cols="50" rows="4"></textarea> <br>
                <input type="submit" value="Posten" name="submit">
            </form>
            <br>
            <form action="phpfiles/do_bildupload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" style="margin-bottom: 10px">
                <input type="submit" value="Bild posten" name="submit">
            </form>
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
            echo "<a>".$row['author']."</a>";
            echo "</div>";
            echo "<div class=\"content\" style=\"background-color: white; width: 70%\">";
            echo "<a>".$row['content']."</a>"."</br>";
            echo "<a href='bildupload/$bildlink'><img class='bild' src='bildupload/$bildlink' style='max-width: 100%'; height='auto'";
            echo "</div>";
            echo "</div>";

        }

        ?>

    </div>
</div>

</body>

</html>

