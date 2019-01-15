<?php

session_start();
include 'passwords/db.php';
include 'header.html';
$usernameandere = $_GET ["usernameandere"];
$username = $_SESSION ["username"];
$_SESSION ["usernameandere"] = $usernameandere;
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Mein Profil</title>
</head>

<head>
    <meta charset="UTF-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="src/fullclip.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Mein Profil</title>

    <style>
        #update_benutzerprofil {
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #B0C4DE;
            background: white;
            border-radius: 0px 0px 10px 10px;
        }

        #upload_probilbild {
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

        .profil {
            width: 50%;
            height: 50%;
            background-color: #2b4046;
            color: white;
            margin-top: 10px;
            padding-top: 5px
        }

        .user {
            float: right;
            background-color: #2b4046;
        }
    </style>
</head>

<body>
<?php
$pdo = new PDO($dsn, $dbuser, $dbpass, $option);


$statement = $pdo->prepare("SELECT * FROM users WHERE username = '$usernameandere'");
$statement->execute(array($usernameandere));
while ($row = $statement->fetch()) {

?>
<div id="main" align="center" style="width:100%; height:100%">
    <h1><?php echo $row['vorname'] . " " . $row['nachname'] ?>s Daten</h1>
    <div class="profil" align="center">
        <div id="main" align="center" style="width:100%; height:100%">
            <?php
            echo $row['vorname'] . " " . $row['nachname'] . "<br /><br />";
            echo "Studiengang: " . $row['studiengang'] . "<br /><br />";
            echo "E-Mail: " . $row['email'] . "<br /><br />";
            echo "Fakultät: " . $row['fakultaet'] . "<br /><br />";
            echo $row['vorname'] . " " . $row['nachname'] . "s Beiträge:<br /><br />"; }
            ?>

            <p>
                <?php
                $statement = $pdo->prepare("SELECT * FROM posts WHERE author = '$usernameandere'");
                $statement->execute(array($usernameandere));
                while ($row = $statement->fetch()) {
                    echo $row['content'] . " <br /><br />";
                }
                ?>
            </p>


            <?php
            $statement = $pdo->prepare("SELECT usernameandere FROM following WHERE (usernameandere =:usernameandere AND username=:username)");
            $statement-> execute(array(":username"=>"$username",":usernameandere"=>"$usernameandere"));
            $row = $statement->fetch();
            if ($usernameandere == $row['usernameandere']){
                echo "<button id=\"entfolgen\" onclick=\"location.href='do_entfolgen.php'\" type=\"submit\" class=\"btn btn-secondary\">Entfolgen</button>";
            }
            else {
                echo "<button id=\"folgen\" onclick=\"location.href='do_folgen.php'\" type=\"submit\" class=\"btn btn-secondary\">Folgen</button>";
            }
            ?>
        </div>


        <div>
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
                    <label>s Beiträge</label>
                    <input type="text" name="beitraege" required>
                </div>

                <div class="input-group">
                    <button type="submit" class="btn" name="update_user">Update</button>
                </div>
            </form>
        </div>

        <div style="margin-top: 300px">

            <form id="upload_probilbild" method="post" action="phpfiles/do_upload_profilbild.php"
                  enctype="multipart/form-data">
                <input type="file" name="profilbild">
                <button type="submit" name="submit">Profilbild aktualisieren</button>

            </form>
        </div>


</body>
<script>
    $(document).ready(function () {
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