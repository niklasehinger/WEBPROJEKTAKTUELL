<?php
include 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html">

<head>
    <title>Pigeon</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" >
     <style>
         .button {
             background-color: #2b4046;
             border: none;
             color: white;
             padding: 15px 32px;
             margin: 5px;
             text-align: center;
             text-decoration: none;
             display: inline-block;
             font-size: 24px;
         }

         body { background-color: #ffcc99;}

         .loginform {
             text-align: center;
             margin-top: 100px;
         }
         .logo{
             font-family:'Arial Black';
             font-weight: bold;
             font-size: 20em;
             text-align: center;
             color: #2b4046;
             line-height: unset;
             margin-top: -80px;
         }
         .text {
             font-family: 'Arial Black';
             font-weight: lighter;
             font-size: 3em;
             text-align: center;
             color: #2b4046;
             line-height: unset;
             margin-top: -100px;
         }

         form, .content {
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
             background: #5F9EA0;
             border: none;
             border-radius: 5px;
         }
         
     </style>

</head>

<body>

<div class="logo">PIGEON</div>
<div class="text">Willkommen auf der besten Website der Welt</div>

<div class="login"><a href="javascript:login('show');">login</a></div>

<form method="post">
    <div id="popupbox" class="input-group">
        <label>Username</label>
        <input type="text" name="username" >
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
        Not yet a member? <a href="register.php">Sign up</a>
    </p>
</form>


<!-- Optional JavaScript -->
<script language="JavaScript" type="text/javascript">
    function login(showhide){
        if(showhide == "show"){
            document.getElementById('popupbox').style.visibility="visible";
        }else if(showhide == "hide"){
            document.getElementById('popupbox').style.visibility="hidden";
        }
    }
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

