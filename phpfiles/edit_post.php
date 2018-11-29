<?php
include_once '../passwords/db.php';
session_start();

$post = $_POST["post"];
$id = $_POST["post_id"];
$pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
$sql = "UPDATE posts SET post=:post WHERE posts_id=:id";
$stmt=$pdo->prepare($sql);
if (!$stmt){
    echo "Prepare Fehler.";
}
//echo $pdo->query();
if (!$stmt->execute(array( ':post'=>$post, ':id'=>$id))) {
    echo "Query Fehler.";
}
?>