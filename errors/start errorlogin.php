<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
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

        body {
            font: 20px Roboto, sans-serif;
            background-color: white;
        }

        .jumbotron {
            background-color: whitesmoke;
        }

        .logo {
            padding: 30px;
        }

        .loginbutton {
            background-color: transparent;
            padding: 7px;
            border: none;
            color: #0068ff;
            text-decoration: none;
            font-size: 20px;
        }
        .loginbutton:hover {
            border-radius: 5px;
            background-color: #0068ff;
            text-decoration: none;
            color: whitesmoke;
        }

        .margin {
            margin: 60px;
        }

    </style>
</head>


<body>

<div class="container">
    <div class="jumbotron margin" align="center">
        <div class="container">
            <img src="../Logos/Logo-Blau.png" class="img-responsive logo" style="display:inline" alt="Logo" width="200" height="200"> <br/>
            <p>Benutername oder Passwort ist falsch!</p>
            <form class="form-inline" id="login" method="post" action="../phpfiles/login.php" >
                <div class="input-group ">
                    <input type="text" name="username" class="form-control" size="10" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" size="10" placeholder="Passwort" required>
                </div>
                <div class="input-group ">
                    <button type="submit" class="loginbutton" name="login_user">Login</button>
                </div>
            </form>
            <a type="button" id="loginbutton" class="loginbutton">Login</a>
        </div>

        <p class="margin" align="center" id="neuhier">Neu hier?</p>
        <button class="loginbutton " type="button" id="registerfirst">Registrieren</button>


        <form id="register" method="post" action="phpfiles/register.php" enctype="multipart/form-data">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="input-group">
                <label>Vorname</label>
                <input type="text" name="vorname" required>
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
                <label>Passwort</label>
                <input type="password" name="passwort" required>
            </div>
            <div class="input-group">
                <button type="submit" class="loginbutton" name="register_user">Registrieren</button>
            </div>
            Bereits registriert? <button class="loginbutton" type="button" id="signup" >Login</button>
        </form>

    </div>
</div>


<script>
    $(document).ready (function(){
        $('#login').hide();
        $('#register').hide();
    });

    $(function () {
        $('#loginbutton').click(function () {
            $('#login').show();
            $('#loginbutton').hide();

        });
    });

    $(function () {
        $('#registerfirst').click(function () {
            $('#loginbutton').hide();
            $('#register').show();
            $('#neuhier').hide();
            $('#registerfirst').hide();
        });
    });

    $(function () {
        $('#signup').click(function () {
            $('#login').show();
            $('#register').hide();
        });
    });


</script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
