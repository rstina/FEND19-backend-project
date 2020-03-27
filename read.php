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
  $stmt = $db->prepare("SELECT * FROM blog");
  // verkställ
  $stmt->execute();

  // starta div för inlägg
  echo "<div class='row'>";

  // loopar över arrayen som har resultatet från db
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
    // spara id från db i en variabel
    $id = htmlspecialchars($row['id']); // $row = array
    // spara innehåll från db i en variabel
    $content = htmlspecialchars($row['content']);
?>

<div class="col-md-3">
  <p>
    <?php 
      // 
      echo $content; 
    ?>
  </p>
</div>

<?php

  endwhile;

  echo "</div>";
