<?php
include '../passwords/db.php';
session_start();


if (isset($_POST['submit'])); {


    $file = $_FILES['profilbild'];
    $username = $_SESSION['username'];


    $fileName = $_FILES['profilbild']['name'];
    $fileTmpName = $_FILES['profilbild']['tmp_name'];
    $fileSize = $_FILES['profilbild']['size'];
    $fileError = $_FILES['profilbild']['error'];
    $fileType = $_FILES['profilbild']['type'];



    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg', 'png');

    if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 5000000) {
                $fileDestination = '/home/ne025/public_html/profilbild/'.$username;
                move_uploaded_file($fileTmpName, $fileDestination);

                $bild_id = $username;
                $pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
                $statement = $pdo->prepare("UPDATE users SET pb = :pb_neu WHERE username = :username");
                $statement->execute(array('username' => $username, 'pb_neu' => $bild_id));



                header("Location: ../Benutzerprofil.php?uploadsuccess");


            } else { header("Location: ../Benutzerprofil.php?seite=zugroß");}

        } else {header("Location: ../Benutzerprofil.php?seite=uploadfehlgeschlagen");}

    } else {header("Location: ../Benutzerprofil.php?seite=fehlerhaftedatei");}

}




