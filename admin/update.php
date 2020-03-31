<?php
/**************************************** *
 * filename: update.php
 * author: Stina Englesson & Jing-Jing Lin
 * date 2020-03-27
 * 
 * update post in db
**************************************** */

require_once '../db.php';

$id = htmlentities($_GET['id']);

$heading = htmlspecialchars($_POST['heading']);
$content = htmlspecialchars($_POST['content']);
$map = ($_POST['map']);
$video = ($_POST['video']);

if(isset($_FILES["image"]["name"])){
  $image = htmlspecialchars(basename( $_FILES["image"]["name"]));
//   // echo "NEW IMAGE<br>";
//   // echo $image;
//   // echo "<pre>";
//   print_r($_FILES);
//   // echo "<pre>";

  $target_dir = "../images/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check !== false) {
          // echo "<img src='../images/$target_file' alt='' width='200px'><br>";
          $uploadOk = 1;
      } else {
          // echo "Det här är ingen bild.<br>";
          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      // echo "Den här bilden fanns redan.<br>";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["image"]["size"] > 500000) {
      // echo "Tyvärr, filen är för stor.<br>";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      // echo "Tyvärr, bara JPG, JPEG, PNG & GIF är tillåtna filformat.<br>";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      // echo "Filen gick inte att ladda upp.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo " Bilden ". basename( $_FILES["image"]["name"]). " har laddats upp.<br>";
      } else {
          // echo "Tyvärr, det blev något fel vid uppladdning av fil.<br>";
      }
  }
} else {
  $sql = 'SELECT image FROM blog WHERE id = :id';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $image = htmlspecialchars($row['image']);
  // echo "KEEP IMAGE<br>";
  // echo $image;
}

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
?>
