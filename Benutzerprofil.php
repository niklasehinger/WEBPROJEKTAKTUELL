<?php
session_start();
include 'passwords/db.php';
include 'header.html';
?>

<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Mein Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
/*
        #update_benutzerprofil {
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #B0C4DE;
            background: white;
            border-radius: 0px 0px 10px 10px;
        }

        #upload_probilbild{
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #B0C4DE;
            background: white;
            border-radius: 0px 0px 10px 10px;
        }

        .input-group {
            margin: 10px 0px 10px 0px;
        }
        .input-group label {
            display: block;
            text-align: left;
            margin: 3px;
        }
        .input-group input {
            height: 30px;
            width: 93%;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
        }
        .btn {
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #000000;
            border: none;
            border-radius: 5px;
        }

        .profil{
            width: 50%;
            height: 50%;
            background-color: #2b4046;
            color: white;
            margin-top: 10px;
            padding-top: 5px
        }
*/

    </style>
</head>

<body>




<div id="container" align="center">

            <?php

            $pdo = new PDO($dsn, $dbuser, $dbpass, $option);

            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            } else {
                echo"Bitte zuerst  <a href=\"start.php\">einloggen</a>";
                die();
            }


            $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $statement->execute(array(":username"=>"$username"));
            while($row = $statement->fetch()) {
                echo "<div class=\"profil\" align=\"center\" >";
                echo $row['vorname']." ".$row['nachname']."<br /><br />";
                echo "Studiengang: ".$row['studiengang']."<br /><br />";
                echo "E-Mail: ".$row['email']."<br /><br />";
                echo "<button type='submit'><img src='pictures/icons/cogwheel-setting-2.png' id='updatebutton' align='top' ></button>";
                echo "<button type='submit'><img src='pictures/icons/cogwheel-setting-2.png' id='upload_bild' align='top' ></button>";
                echo "</div>";
                echo "Meine Beiträge: <br /><br />";
            }

            ?>


                <?php

                $pdo = new PDO($dsn, $dbuser, $dbpass, $option);
                $statement = $pdo->prepare("SELECT * FROM posts WHERE author = :username");
                $statement->execute(array(":username"=>"$username"));
                while ($row = $statement->fetch()) {
                    echo $row['content'] . " <br /><br />";
                }
                ?>


</div>



<div style="margin-top: 100px">
    <form id="update_benutzerprofil" method="post" action="phpfiles/do_update_Benutzerprofil.php">
        <div class="input-group">
            <label>Vorname</label>
            <input type="text" name="vorname">
        </div>
        <div class="input-group">
            <label>Nachname</label>
            <input type="text" name="nachname" required>
        </div>
        <div class="input-group">
            <label>Studiengang</label>
            <input type="text" name="studiengang" required>
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="input-group">
            <label>Fakultät</label>
            <input type="text" name="fakultaet" required>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="update_user">Update</button>
        </div>
    </form>
</div>

<div style="margin-top: 300px">

    <form id="upload_probilbild" method="post" action="phpfiles/do_upload_profilbild.php" enctype="multipart/form-data">
        <input type="file" name="profilbild">
        <button type="submit" name="submit">Profilbild aktualisieren</button>

    </form>
</div>




</body>
<script>
    $(document).ready (function(){
        $('#update_benutzerprofil').hide();
        $('#upload_probilbild').hide();
    });

    $(function () {
        $('#updatebutton').click(function () {
            $('#update_benutzerprofil').show();


        });
    });

    $(function () {
        $('#upload_bild').click(function () {
            $('#upload_probilbild').show();


        });
    });


</script>

</html>