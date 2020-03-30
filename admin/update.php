<?php
include_once '../db.php';


$id = htmlentities($_GET['id']);
$heading = htmlspecialchars($_POST['heading']);
$content = htmlspecialchars($_POST['content']);
// $map = htmlspecialchars($_POST['map']);
// $video = htmlspecialchars($_POST['video']);
// $image = htmlspecialchars($_POST['image']);
// $publish = htmlspecialchars($_POST['publish']);

echo $heading;



$sql = "UPDATE blog
SET heading = '$heading', content = '$content'
WHERE id = $id;";

$stmt = $db->prepare($sql);
$stmt->execute();

header('Location: index.php');