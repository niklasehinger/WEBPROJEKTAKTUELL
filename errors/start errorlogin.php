<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

<head>
    <title>Pigeon</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="src/fullclip.min.js"></script>
    <style>
        body {
            background-image: url("../pictures/workspace.jpg");
        }

        #loginbutton {
            background-color: #2b4046;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 24px;
            left: 50%;
        }

        .logo{
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family:'Arial Black';
            font-weight: bold;
            font-size: 15em;
            text-align: center;

        }

        #login {
            width: 30%;
            margin: 0px auto;
            padding: 20px;
            border: 1px solid #B0C4DE;
            background: white;
            border-radius: 0px 0px 10px 10px;
        }


        #register {
            width: 30%;
            margin: 0px auto;
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

        .error{
            display: flex;
            align-items: center;
            justify-content: center;
            font-family:'Arial Black';
            font-weight: bold;
            font-size: 15px;
            text-align: center;

        }


    </style>

</head>

<body>

<div class="logo">PIGEON</div>
<div class="error">Benutzername oder Passwort ist falsch oder nicht vergeben. </div>


<button type="button" id="loginbutton">Login</button>


<form id="login" method="post" action="../phpfiles/login.php">
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" required>
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" required>
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
        Not yet a member? <button type="button" id="registerfirst">Registrieren</button>
    </p>
</form>


<form id="register" method="post" action="../phpfiles/register.php">
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
        <label>Email</label>
        <input type="email" name="email" required>
    </div>
    <div class="input-group">
        <label>Passwort</label>
        <input type="password" name="passwort" required>
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="register_user">Register</button>
    </div>
    <p>
        Bereits registriert? <button type="button" id="signup" >Login</button>
    </p>
</form>

<script>
    $(document).ready (function(){
        $('#login').show();
        $('#register').hide();
        $('#loginbutton').hide();
    });

    $(function () {
        $('#loginbutton').click(function () {
            $('#login').show();
            $('#loginbutton').hide();
        });
    });

    $(function () {
        $('#registerfirst').click(function () {
            $('#login').hide();
            $('#register').show();
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

