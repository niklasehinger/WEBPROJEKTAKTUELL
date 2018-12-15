<?php
include '../passwords/db.php';
session_start();

if ($_POST['upload']){

    $bildname = $_FILES['profilbild']['name'];
    $bildtmp = $_FILES['profilbild']['tmp_name'];

    $bildname=$_SESSION['username'].".jpg";


        $pfad = "/home/ne025/public_html/profilbild/".$bildname;
        move_uploaded_file($bildtmp, $pfad );

        $username=$_SESSION['username'];

        $pdo = new PDO($dsn, $dbuser, $dbpass, $option);
        $statement = $pdo->prepare("UPDATE users SET pb = :pb_neu, email WHERE username = :username");
        $statement->execute(array('username' => $username, 'pb_neu' => $pfad));


}

echo $pfad;



