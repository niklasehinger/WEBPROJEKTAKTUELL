<?php
session_start();


?>

<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Pigeon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../ui/sweetalert/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../ui/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,700i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

        body {
            background-image: url(Logos/BG.jpg);
        }

        .jumbotron {
            background-color: white;
            box-shadow:1px 1px 30px 1px  darkblue;
        }

    </style>
</head>


<body>

<?php
if ($_GET["seite"]=="falsch"){
    echo "<script type='text/javascript'>swal('Benutzername oder Passwort ist falsch');</script>";
}

if ($_GET["seite"]=="username"){
    echo "<script type='text/javascript'>swal('Benutzername ist bereits vergeben!');</script>";
}

?>

<div class="container">
    <div class="jumbotron marginmedia marginmediasm" style="border-radius: 100px" align="center">
        <div class="container">
            <img src="Logos/Logo-Blau.png" class="img-responsive logo" style="display:inline" alt="Logo" width="150" height="150"> <br/>
            <form class="form-inline" id="login" method="post" action="phpfiles/login.php" >
                <div class="input-group ">
                    <input type="text" name="username" class="form-control" size="10" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" name="passwort" class="form-control" size="10" placeholder="Passwort" required>
                </div>
                <div class="input-group ">
                    <button type="submit" class="loginbutton" name="login_user">Login</button>
                </div>
            </form>
            <button type="button" id="loginbutton" class="loginbutton">Login</button>
        </div>

        <button class="registerbutton" style="margin-top: 10px" type="button" id="registerfirst">Registrieren</button>


        <form class=" registrieren py-lg-5" id="register" method="post" action="phpfiles/register.php" enctype="multipart/form-data">

            <div class="form-group">
                <label for="input2">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>

            <div class="form-group">
                <label for="input2">Vorname</label>
                <input type="text" class="form-control" name="vorname" required>
            </div>

            <div class="form-group">
                <label for="input2">Nachname</label>
                <input type="text" class="form-control" name="nachname" required>
            </div>

            <div class="form-group">
                <label for="input4">Studiengang</label>
                <select type="text" class="form-control" name="studiengang" required>
                    <option>Online-Medien-Management</option>
                    <option>Informationsdesign</option>
                    <option>Wirtschaftsinformatik</option>
                    <option>Audiovisuellemedien</option>
                    <option>Medieninformatik</option>
                </select>
            </div>

            <div class="form-group">
                <label for="input2">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label for="input2">Passwort</label>
                <input id="input2" class="form-control" type="password" name="passwort" required>
            </div>

            <div class="input-group">
                <button type="submit" class="loginbutton" name="register_user">Registrieren</button>
            </div>
            <button class="registerbutton" type="button" id="signup" >Bereits registriert?</button>
        </form>

    </div>
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
            $('#login').hide();
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

