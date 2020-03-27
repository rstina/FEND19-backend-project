<?php
/**************************************** *
 * filename: read.php
 * author: Stina Englesson & Jing-Jing Lin
 * date 2020-03-27
 * 
 * read info from db
**************************************** */

      // hämta alla inlägg
      require_once 'db.php';
      $stmt = $db->prepare("SELECT * FROM blog");
      $stmt->execute();

      echo "<div class='row'>";

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
        $id = htmlspecialchars($row['id']);
        $content = htmlspecialchars($row['content']);
?>

<div class="col-md-3">
  <p>
    <?php echo $content; ?>
  </p>
</div>

<?php

  endwhile;

  echo "</div>";
