<?php
include_once '../db.php';

$id = htmlentities($_GET['id']);
$publish = "publish";

$sql = "UPDATE blog
SET 
publish = '$publish'
WHERE id = $id;";

$stmt = $db->prepare($sql);
$stmt->execute();

header('Location: index.php');