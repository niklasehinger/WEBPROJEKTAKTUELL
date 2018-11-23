<?php
session_start();
$id = $_SESSION['2'];

include_once ('passwords/db.php');

?>

<!DOCTYPE html>
<html lang="en">
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
<div>
    <h1>Bearbeite dein Profil</h1>
    <form action="ei">  </form>

    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width: 25%">
        <h3>Info</h3>
        <li><a href="#" class="active" id="button1">Übersicht</a></li>
        <li>
            <a href="#" id="button2">Ich an der HdM</a>
        </li>

        <li><a href="#" id="button3">Arbeit und Ausbildung</a></li>
        <li><a href="#" id="button3"></a></li>

        <li><a href="#" id="button4">Kontaktinformationen</a></li>
        <li><a href="#" id="button4"></a></li>
    </div>


    <div id="upload"  style=>
        <form action="" method="POST">
            Bild: <input type="file" name="bild">
            <input type="submit" name="upload" value="upload">
        </form>
    </div>

</div>
<div id="Uebersicht" style="font-family:'Arial Black'; font-weight: bold; text-align:center;">
    <div class="w3-container w3-teal">
        <h1>Übersicht</h1>

        <?php
        $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
        $sql = "Select nachname, vorname, email, from users where id=2";
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
        while ($zeile = $stmt -> fetchObject()){


        ?>
        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Vorname</label>
            <div class="col-4">
                <?php
                echo($zeile->vorname);
                ?>
            </div>
        </div>

        <div class="form-group row" style="font-family:'Arial Black'; font-weight: bold; text-align:center;">
            <label for="username" class="col-4 col-form-label">Nachname</label>
            <div class="col-4">
                <?php
                echo($zeile->nachname);
                ?>
            </div>
        </div>

        <div class="form-group row" style="font-family:'Arial Black'; font-weight: bold; text-align:center;">
            <label for="username" class="col-4 col-form-label">E-Mail</label>
            <div class="col-4">
                <?php
                echo($zeile->email);
                }
                ?>
            </div>
        </div>


        <div>
            <button type="button" class="btn btn-primary">Speichern</button>
        </div>
    </div>
</div>


<div id="IchanderHdM" style="font-family:'Arial Black'; font-weight: bold; text-align:center;">
    <h1>Ich an der HdM</h1>


    <div class="form-group row">
        <label for="username" class="col-4 col-form-label">Fakultät</label>
        <div class="col-4">
            <form action="#">
                <select>
                    <option value="IK">Information und Kommunikation</option>
                    <option value="DuM">Druck und Medien</option>
                    <option value="EM">Electronic Media</option>
                </select>
            </form>
        </div>
    </div>

    <div id="InformationundKommunikation">
        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Studiengang</label>
            <div class="col-4">
                <form action="#">
                    <select>
                        <option value="BI">Bibliotheks- und Informationsmanagement</option>
                        <option value="ID">Informationsdesign</option>
                        <option value="OMM">Online-Medien-Management</option>
                        <option value="WI">Wirtschaftsinformatik und digitale Medien</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div id="DruckundMedien">
        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Studiengang</label>
            <div class="col-4">
                <form action="#">
                    <select>
                        <option value="MT">Medien- und Technologie (deutsch-chinesich)</option>
                        <option value="VT">Verpackungstechnik (deutsch-chinesisch)</option>
                        <option value="DM">Druck- und Medientechnologie/ Digital Publishing</option>
                        <option value="IP">Integriertes Produktdesign</option>
                        <option value="MP">Mediapublishing</option>
                        <option value="MI">Medieninformatik</option>
                        <option value="MM">Mobile Medien</option>
                        <option value="PMT">Print Media Technologies</option>
                        <option value="PMM">Print Media Mangagement</option>
                        <option value="VT">Verpackungstechnik</option>
                        <option value="WIM">Wirtschaftsingeneurwesen Medien</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div id="ElectronicMedia">
        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Studiengang</label>
            <div class="col-4">
                <form action="#">
                    <select>
                        <option value="AM">Audiovisuelle Medien</option>
                        <option value="CR">Crossmedia-Redaktion/Public Relations</option>
                        <option value="MW">Medienwirtschaft</option>
                        <option value="WM">Werbung- und Marktkommunikation</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="username" class="col-4 col-form-label">Semester</label>
        <div class="col-4">
            <input id="username" name="username" class="form-control here"
                   required="required"
                   type="text">
        </div>

        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Projekte</label>
            <div class="col-4">
                <input id="username" name="username" class="form-control here"
                       required="required"
                       type="text">
            </div>
        </div>
        <button type="button" class="btn btn-primary">Speichern</button>
    </div>
</div>

<div id="ArbeitundAusbildung" style="font-family:'Arial Black'; font-weight: bold; text-align:center;">
    <h1>Arbeit und Ausbildung</h1>
    <form action="#" method="post">
    <div class="form-group row">
        <label for="username" class="col-4 col-form-label">Arbeitgeber</label>
        <div class="col-4">
            <input id="username" name="username" class="form-control here"
                   required="required"
                   type="text">
        </div>
    </div>

    <div class="form-group row">
        <label for="username" class="col-4 col-form-label">Schule</label>
        <div class="col-4">
            <input id="username" name="username" class="form-control here"
                   required="required"
                   type="text" >
        </div>
    </div>
    </form>


    <div class="form-group row">
        <label for="username" class="col-4 col-form-label">seit:</label>
        <div class="col-4">
            <label for="gebdat">
                <input type="date" id="gebdat">
            </label>
        </div>
    </div>

    <button type="button" class="btn btn-primary">Speichern</button>
</div>


<div>
    <div id="Hierfindestdumichauch" div style="font-family:'Arial Black'; font-weight: bold; text-align:center">
        <h1>Hier findest du mich auch:</h1>


        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Websites</label>
            <div class="col-4">
                <input id="username" name="username" class="form-control here"
                       required="required"
                       type="text">
            </div>
        </div>

        <div class="form-group row" div style="text-align: center">
            <label for="username" class="col-4 col-form-label">Social Links</label>
            <div class="col-4">
                <input id="username" name="username" class="form-control here"
                       required="required"
                       type="text">
            </div>
        </div>

        <button type="button" class="btn btn-primary">Speichern</button>
    </div>
</div>

<script>


    $(document).ready(function () {
        $('#ArbeitundAusbildung').hide();
        $('#IchanderHdM').hide();
        $('#Uebersicht').show();
        $('#Hierfindestdumichauch').hide();
    });

    $(function () {
        $('#button1').click(function () {
            $('#IchanderHdM').hide();
            $('#ArbeitundAusbildung').hide();
            $('#Uebersicht').show();
            $('#Hierfindestdumichauch').hide();
        });
    });

    $(function () {
        $('#button2').click(function () {
            $('#IchanderHdM').show();
            $('#ArbeitundAusbildung').hide();
            $('#Uebersicht').hide();
            $('#Hierfindestdumichauch').hide();
        });
    });

    $(function () {
        $('#button3').click(function () {
            $('#IchanderHdM').hide();
            $('#ArbeitundAusbildung').show();
            $('#Uebersicht').hide();
            $('#Hierfindestdumichauch').hide();
        });
    });

    $(function () {
        $('#button4').click(function () {
            $('#IchanderHdM').hide();
            $('#ArbeitundAusbildung').hide();
            $('#Uebersicht').hide();
            $('#Hierfindestdumichauch').show();
        });
    });
</script>
</body>
</html>