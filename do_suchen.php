<?php

session_start ();
include 'passwords/db.php';
include 'header.php';
$suche = $_GET['searchbox'];
header ("Location: andererprofile.php?usernameandere=$suche");

?>