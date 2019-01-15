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
                $fileNameNew = uniqid('', true).".". $fileActualExt;
                $fileDestination = '/home/ne025/public_html/profilbild/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $bild_id = $fileNameNew;
                $pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
                $sql = "INSERT INTO pb (username, pb) VALUES (?, ?)";
                $statement = $pdo->prepare($sql);
                $statement->execute(array("$username", "$bild_id"));


                header("Location: ../Benutzerprofil.php?uploadsuccess");


            } else {echo "Die Datei ist zu groß!";}

        } else {echo "Die Datei konnte nicht hochgeladen werden!";}

    } else {echo "Dateiformat nicht akzeptiert!";}

}




