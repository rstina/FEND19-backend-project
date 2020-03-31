<?php
/**************************************** *
 * filename: read.php
 * author: Stina Englesson & Jing-Jing Lin
 * date 2020-03-27
 * 
 * read info from db
**************************************** */

  // koppla till databas
  require_once 'db.php';
  // förbered SQL-förfrågning
  $stmt = $db->prepare("SELECT * FROM blog ORDER BY date DESC");
  // verkställ
  $stmt->execute();
  // starta div för inlägg
  echo "<div class='container'>";

  // loopar över arrayen som har resultatet från db
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
    // spara data från db i varsin variabel
    $id = htmlspecialchars($row['id']); // $row = array
    $heading = htmlspecialchars($row['heading']);
    $image = htmlspecialchars($row['image']);
    $content = htmlspecialchars($row['content']);
    $date = htmlspecialchars($row['date']);
    $map = $row['map'];
    $video = $row['video'];

    if(!empty($video)){
      $videotext = $video;
    } else {
      $videotext = '';
    }
    $publish = ($row['publish']);
    if( $publish == 'publish' ){
      $publishtext = "Publicerad";
      $unpublish = '<p><a href="unpublish-update.php?id='.$id.'" class="btn btn-sm btn-danger">Avpublicera</a>';
    } else {
      $publishtext = "Opublicerad";
      $unpublish = '<a href="publish-update.php?id='.$id.'" class="btn btn-sm btn-success">Publicera</a>';
    }
    // echo "<pre>";
    // print_r($row);
    // echo "</pre>";

      // skriv ut content
      // OBS! ÄNDRA KARTAN TILL DE SOM HAR DET INLAGT
    echo "<br>
    <div>
      <div class='card'>
        <div class='card-body'>
          <p class='text-muted'>$publishtext</p>
          $unpublish
          <h2>$heading</h2>
          <img src='../images/$image' alt='$image' width='200px'>
          <p>$content</p>
          $videotext
          <p>$date</p>
          <a href='edit.php?id=$id' class='btn btn-sm btn-info'>Redigera</a>
          <a href='delete.php?id=$id' class='btn btn-sm btn-warning'>Ta bort</a>
        </div>
      </div>
    </div>
    "; 

  // avsluta while loop
  endwhile;
// stäng post div
  echo "</div>";
?>


