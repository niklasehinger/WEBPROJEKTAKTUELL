<?php
session_start();
include '../passwords/db.php';




if (isset($_POST['submit'])); {
    $profilbild = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true).".". $fileActualExt;
                $fileDestination = '/home/ne025/public_html/bildupload/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);


                $author = $_SESSION['username'];
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


/*include '../passwords/db.php';
session_start();
$_SESSION["username"]=$username;

$file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));


    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize< 5000000){
                $fileNameNew = uniqid('', true).$username.".".$fileActualExt;
                $fileDestination = "../bildupload/".$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $bild_id = $fileNameNew;
                $pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
                $sql = "INSERT INTO posts (username, bild_id) VALUES (?, ?)";
                $statement = $pdo->prepare($sql);
                $statement->execute(array("$username", "$bild_id"));
                header("Location: ../index.php");
            }else {
                echo"Deine Datei ist zu groß! (Max Größe 5MB)";
            }
        }else {
            echo"Leider gab es ein Problem! :(";
        }
    }else {
        echo"Dieses Dateiformat wird nicht unterstützt!";
    }*/

