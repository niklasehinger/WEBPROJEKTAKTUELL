<?php
include '../passwords/db.php';
session_start();

if (isset($_POST['submit'])); {


    $file = $_FILES['profilbild'];
    $user = $_SESSION['username'];


    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];



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
                $sql = "INSERT INTO posts (author, bild_id) VALUES (?, ?)";
                $statement = $pdo->prepare($sql);
                $statement->execute(array("$author", "$bild_id"));


                header("Location: ../index.php?uploadsuccess");


            } else {echo "Die Datei ist zu groß!";}

        } else {echo "Die Datei konnte nicht hochgeladen werden!";}

    } else {echo "Dateiformat nicht akzeptiert!";}

}





