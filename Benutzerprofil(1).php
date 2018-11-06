<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="src/fullclip.min.js"></script>
    <title>Mein Profil</title>


</head>
<body>
<h1>Bearbeite dein Profil</h1>
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
    <h3>Info</h3>
    <li><a href="#" class="active" id="button1">Übersicht</a></li>
    <li>
        <a href="#" id="button2">Ich an der HdM</a>
    </li>
    <li><a href="#" id="button3">Hier findest du mich auch</a></li>
</div>
<div style="margin-left:25%">
    <div id="Uebersicht" div style="display: block">
        <div class="w3-container w3-teal">
            <h1>Übersicht</h1>
        </div>

        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Vorname</label>
            <div class="col-4">
                <input id="username" name="username" class="form-control here"
                       required="required"
                       type="text">
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Nachname</label>
            <div class="col-4">
                <input id="username" name="username" class="form-control here"
                       required="required"
                       type="text">
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Geburtstag</label>
            <label for="gebdat">
                <input type="date" id="gebdat">
            </label>
        </div>

        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Wohnort</label>
            <div class="col-4">
                <input id="username" name="username" class="form-control here"
                       required="required"
                       type="text">
            </div>
        </div>

        <button type="button" class="btn btn-primary">Bearbeiten</button>
    </div>
</div>
<div id="ArbeitundAusbildung" >
<div style="margin-left:25%">

        <h1>Ich an der HdM</h1>


        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Studiengang</label>
            <div class="col-4">
                <input id="username" name="username" class="form-control here"
                       required="required"
                       type="text">
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Fakultät</label>
            <div class="col-4">
                <input id="username" name="username" class="form-control here"
                       required="required"
                       type="text">
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Projekte</label>
            <label for="gebdat">
                <input type="date" id="gebdat">
            </label>
        </div>

        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Werkstudentenjob als</label>
            <div class="col-4">
                <input id="username" name="username" class="form-control here"
                       required="required"
                       type="text">
            </div>
        </div>

        <button type="button" class="btn btn-primary">Bearbeiten</button>
    </div>
</div>
<div style="margin-left:25%">
    <div id="Detailsüberdich" >
        <div class="w3-container w3-teal">
            <h1>Hier findest du mich auch:</h1>
        </div>

        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Websites</label>
            <div class="col-4">
                <input id="username" name="username" class="form-control here"
                       required="required"
                       type="text">
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Social Links</label>
            <div class="col-4">
                <input id="username" name="username" class="form-control here"
                       required="required"
                       type="text">
            </div>
        </div>

        <button type="button" class="btn btn-primary">Bearbeiten</button>
    </div>
</div>

<script>
    $(document).ready (function(){
        $('#ArbeitundAusbildung').hide();
        $('#Detailsüberdich').hide();
        $('#Uebersicht').show();
    });

        $(function () {
            $('#button1').click(function () {
                $('#ArbeitundAusbildung').hide();
                $('#Detailsüberdich').hide();
                $('#Uebersicht').show();
            });
        });

        $(function () {
            $('#button2').click(function () {
                $('#ArbeitundAusbildung').show();
                $('#Detailsüberdich').hide();
                $('#Uebersicht').hide();
            });
        });

        $(function () {
            $('#button3').click(function () {
                $('#ArbeitundAusbildung').hide();
                $('#Detailsüberdich').show();
                $('#Uebersicht').hide();
            });
        });

</script>
</body>
</html>