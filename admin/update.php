<?php
include_once '../db.php';

$customerID = htmlentities($_GET['id']);
$heading = htmlentities($_POST['heading']);
echo $heading;

$sql = "UPDATE blog
SET heading = '$heading'
WHERE id = $customerID;";

$stmt = $db->prepare($sql);
$stmt->execute();

header('Location: index.php');