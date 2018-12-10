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

<div id="main" align="center" style="width:100%; height:100%; float:">
    <div class="postings" align="center" style="background-color: black; width: 50%; height: 50%">
        <div class="content" style="background-color: #2b4046; width: 30%">
            <?php
            $pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
            $sql = "SELECT author FROM posts";
            foreach ($pdo->query($sql) as $row) {
                echo $row['author']."<br/><br/>";
            }
            ?>
        </div>
        <div class="content" style="background-color: white; width: 70%">
                <?php
                $pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
                $sql = "SELECT content FROM posts";
                foreach ($pdo->query($sql) as $row) {
                    echo $row['content']."<br/><br/>";
                }
                ?>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>

