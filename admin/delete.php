<?php
/**************************************** *
 * filename: delete.php
 * author: Stina Englesson & Jing-Jing Lin
 * date 2020-03-27
 * 
 * delete blog-post
**************************************** */

include_once '../header-admin.php';

require_once '../db.php';

if(isset($_GET['id'])){

  $id = htmlspecialchars($_GET['id']); 

  $sql = "DELETE FROM blog WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}

header('Location:index.php');



?>

<h1>Radera blogginlägg</h1>

<?php
  include_once '../footer.php';
?>