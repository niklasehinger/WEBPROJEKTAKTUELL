<?php
session_start();
$username = $_SESSION['username'];

if(!isset($_SESSION['username'])) {
    echo "Fehler!!   ";
    echo"Bitte zuerst <a href=\"start.php\">einloggen</a>";
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
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
</head>

<body>
<form action = "do_Übergabe_Benutzerprofil.php" method="post">
    <p>Vorname:</p>
    <input type="text" size="40" maxlength="250" name="vorname" placeholder="Gebe deinen Vornamen ein"><br><br>

    <p>Nachname:</p>
    <input type="text" size="40" maxlength="250" name="nachname" placeholder="Gebe deinen Nachnamen ein"><br><br>

    <p>Email:</p>
    <input type="text" size="40" maxlength="250" name="email" placeholder="Gebe deine E-Mail ein"><br><br>

    <p>Fakultät:</p>
    <input type="text" size="40" maxlength="250" name="fakultät" placeholder="Gebe deine Fakultät ein"><br><br>

    <p>Studiengang:</p>
    <input type="password" size="40"  maxlength="250" name="studiengang" placeholder="Gebe deinen Studiengang ein"><br>

    <p>Semester:</p>
    <input type="password" size="40"  maxlength="250" name="semester" placeholder="Gebe dein aktuelles Semester an"><br>

    <p>Arbeitgeber:</p>
    <input type="password" size="40"  maxlength="250" name="arbeitgeber" placeholder="Hast du einen Werkstudentenjob?"><br>



    <input type="submit" name="Update" value="Ändere deine Angaben">

<!--<body>-->
<!---->
<!--<header>-->
<!--    --><?php
//    include "header.html";
//    ?>
<!--</header>-->
<!---->
<!--<div>-->
<!--    <h1>Bearbeite dein Profil</h1>-->
<!--    <form action="ei"></form>-->
<!---->
<!--   <div class="w3-sidebar w3-light-grey w3-bar-block" style="width: 25%">-->
<!--            <h3>Info</h3>-->
<!---->
<!--            <li><a href="#" class="active" id="button1">Übersicht</a></li>-->
<!---->
<!--            <li><a href="#" id="button2">Ich an der HdM</a></li>-->
<!---->
<!--            <li><a href="#" id="button3">Arbeit und Ausbildung</a></li>-->
<!---->
<!--            <li><a href="#" id="button4">Kontaktinformationen</a></li>-->
<!--        </div>-->
<!---->
<!---->
<!---->
<!---->
<!--    <div id="upload" div style=>-->
<!--    <div id="upload"  style=>-->
<!--        <form action="" method="POST">-->
<!--            Bild: <input type="file" name="bild">-->
<!--            <input type="submit" name="upload" value="upload">-->
<!--        </form>-->
<!--    </div>-->
<!---->
<!---->
<!--<h1>Übersicht</h1>-->
<!--<form action="do_Übergabe_Benutzerprofil.php" method="post">-->
<!--    <p>Vorname<input type="text" id="vorname" name="vorname"></p>-->
<!--    <p>Name<input type="text" id="name" name="name"></p>-->
<!--    <p>E-Mail<input type="text" id="email" name="email"></p>-->
<!--    <p><button type="submit" name="submit">Speichern</button></p>-->
<!--</form>-->
<!---->
<!---->
<!--<h1>Übersicht</h1>-->
<!---->
<?php
//$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
//$sql = "SELECT vorname, nachname, email from users WHERE id=28";
//$stmt= $pdo->prepare($sql);
//$stmt->execute();
//while ($zeile = $stmt -> fetchObject()) {
//    var_dump($zeile);
//}
//?>
<!---->
<!--    <h1>Ich an der HdM</h1>-->
<!--    <form action="do_Übergabe_Benutzerprofil.php" method="post">-->
<!--        <p>Fakultät:<input type="dropdown" id="fakultät" name="fakultät"></p>-->
<!--        <p>Studiengang:<input type="dropdown" id="studiengang" name="studiengang"></p>-->
<!--        <p>Semester:<input type="text" id="semester" name="semester"></p>-->
<!--        <p>Laufende Projekte:<input type="text" id="projekte" name="projekte"></p>-->
<!--        <p><button type="submit" name="submit">Speichern</button></p>-->
<!--    </form>-->
<!---->
<!---->
<!--    <h1>Ich an der HdM</h1>-->
<!---->
<!--    --><?php
//    $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
//    $sql = "Select fakultät, studiengang, semester, projekte from users where id=28";
//    $stmt= $pdo->prepare($sql);
//    $stmt->execute();
//    while ($zeile = $stmt -> fetchObject()) {
//        echo "$zeile->fakultät";
//        echo "$zeile->studiengang";
//        echo "$zeile->semester";
//        echo "$zeile->projekte";
//    }
//
//    $sql=$pdo->prepare("SELECT 'fakultät' FROM Fakultät");
//    $sql->execute();
//    while($sql=$sql->fetch(PDO::FETCH_ASSOC)) {
//        echo "<option value=/" . $sql["fakultät"] . '">' . $sql["fakultät"];
//    }
//    ?>
<!---->
<!---->
<!---->
<!---->
<!--    <h1>Arbeit und Ausbildung</h1>-->
<!--    <form action="do_Übergabe_Benutzerprofil.php" method="post">-->
<!--        <p>Ist hier zur Schule gegangen:<input type="text" id="schule" name="schule"></p>-->
<!--        <p>Arbeitet aktuell bei:<input type="text" id="arbeit" name="arbeit"></p>-->
<!--        <p><button type="submit" name="submit">Speichern</button></p>-->
<!--    </form>-->
<!---->
<!---->
<!--    <h1>Arbeit und Ausbildung</h1>-->
<!---->
<!--    --><?php
//    $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
//    $sql = "Select schule, arbeit, from users where id=28";
//    $stmt= $pdo->prepare($sql);
//    $stmt->execute();
//    while ($zeile = $stmt -> fetchObject()) {
//        echo "$zeile->schule";
//        echo "$zeile->arbeit";
//    }
//    ?>
<!---->
<!---->
<!--    <h1>Hier findest du mich auch</h1>-->
<!--    <form action="do_Übergabe_Benutzerprofil.php" method="post">-->
<!--        <p>Websites<input type="text" id="websites" name="vorname"></p>-->
<!--        <p>Social Links<input type="text" id="sociallinks" name="name"></p>-->
<!--        <p><button type="submit" name="submit">Speichern</button></p>-->
<!--    </form>-->
<!---->
<!---->
<!--    <h1>Hier findest du mich auch</h1>-->
<!---->
<!--    --><?php
//    $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
//    $sql = "Select websites, sociallink, from users where id=28";
//    $stmt= $pdo->prepare($sql);
//    $stmt->execute();
//    while ($zeile = $stmt -> fetchObject()) {
//        echo "$zeile->websites";
//        echo "$zeile->sociallinks";
//
//    }
//    ?>
<!---->
<!---->
<!--<script>-->
<!---->
<!---->
<!--    $(document).ready(function () {-->
<!--        $('#ArbeitundAusbildung').hide();-->
<!--        $('#IchanderHdM').hide();-->
<!--        $('#Uebersicht').show();-->
<!--        $('#Hierfindestdumichauch').hide();-->
<!--    });-->
<!---->
<!--    $(function () {-->
<!--        $('#button1').click(function () {-->
<!--            $('#IchanderHdM').hide();-->
<!--            $('#ArbeitundAusbildung').hide();-->
<!--            $('#Uebersicht').show();-->
<!--            $('#Hierfindestdumichauch').hide();-->
<!--        });-->
<!--    });-->
<!---->
<!--    $(function () {-->
<!--        $('#button2').click(function () {-->
<!--            $('#IchanderHdM').show();-->
<!--            $('#ArbeitundAusbildung').hide();-->
<!--            $('#Uebersicht').hide();-->
<!--            $('#Hierfindestdumichauch').hide();-->
<!--        });-->
<!--    });-->
<!---->
<!--    $(function () {-->
<!--        $('#button3').click(function () {-->
<!--            $('#IchanderHdM').hide();-->
<!--            $('#ArbeitundAusbildung').show();-->
<!--            $('#Uebersicht').hide();-->
<!--            $('#Hierfindestdumichauch').hide();-->
<!--        });-->
<!--    });-->
<!---->
<!--    $(function () {-->
<!--        $('#button4').click(function () {-->
<!--            $('#IchanderHdM').hide();-->
<!--            $('#ArbeitundAusbildung').hide();-->
<!--            $('#Uebersicht').hide();-->
<!--            $('#Hierfindestdumichauch').show();-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!--</body>-->
<!--</html>-->