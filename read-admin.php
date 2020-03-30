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
    $video = htmlspecialchars($row['video']);
    // $publish = htmlspecialchars($row['publish']);

      // skriv ut content
      // OBS! ÄNDRA KARTAN TILL DE SOM HAR DET INLAGT
    echo "<br>
    <div>
      <div class='card'>

      <div class='card-body'>
        <h2>$heading</h2>
          <img src='../images/$image' alt='$image' width='200px'>
          <p>$content</p>
          $map
          <p>$video</p>
          <p>$date</p>
      </div>
      </div>
      <a href='edit.php?id=$id' class='btn btn-sm btn-info'>Redigera</a>
      <a href='delete.php?id=$id' class='btn btn-sm btn-warning'>Ta bort</a>
    </div>
    <br>
    "; 

    // map: <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8138.025369269233!2d18.0585157!3d59.3411953!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2ac59352bbc3fc9a!2sW%C3%A4ng%20Izakaya!5e0!3m2!1ssv!2sse!4v1585325364041!5m2!1ssv!2sse" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

  // avsluta while loop
  endwhile;
// stäng post div
  echo "</div>";
?>
