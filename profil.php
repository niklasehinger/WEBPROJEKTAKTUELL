<?php
session_start();
include_once ("./passwords/db.php");
$id=28;

?>


        <h1>Übersicht</h1>
        <form action="do_Übergabe_Benutzerprofil.php" method="post">
            <p>Vorname:<input type="text" id="vorname" name="vorname"></p>
            <p>Name:<input type="text" id="name" name="name"></p>
            <p>E-Mail:<input type="text" id="email" name="email"></p>
            <p><button type="submit" name="submit">Speichern</button></p>
        </form>


        <h1>Übersicht</h1>

        <?php
        $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
        $sql = "Select nachname, vorname, email, from users where id=28";
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
        while ($zeile = $stmt -> fetchObject()) {
            echo "$zeile->nachname";
        }
        ?>
