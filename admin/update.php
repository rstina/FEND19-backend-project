<?php
include_once '../db.php';


$id = htmlentities($_GET['id']);
$heading = htmlspecialchars($_POST['heading']);
$content = htmlspecialchars($_POST['content']);
$map = ($_POST['map']);
$video = htmlspecialchars($_POST['video']);
$image = htmlspecialchars(basename( $_FILES["image"]["name"]));
// $publish = htmlspecialchars($_POST['publish']);

$sql = "UPDATE blog
SET 
heading = '$heading', 
content = '$content', 
map = '$map', 
video = '$video', 
image = '$image'
WHERE id = $id;";

$stmt = $db->prepare($sql);
$stmt->execute();

header('Location: index.php');