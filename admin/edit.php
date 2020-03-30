<?php
  include_once '../db.php';
  include_once '../header-admin.php';

  $id = htmlentities($_GET['id']);

  // hämtar infon från ordern
  $sql = 'SELECT * FROM blog WHERE id = :id';

  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $heading = htmlspecialchars($row['heading']);
  $content = htmlspecialchars($row['content']);
  $map = htmlspecialchars($row['map']);
  $video = htmlspecialchars($row['video']);
  $image = htmlspecialchars($row['image']);
  $publish = htmlspecialchars($row['publish']);

?>
  
  <h1>Uppdatera blogginlägg</h1>

<form   action="update.php?id=<?php echo $id;?>"       
        enctype="multipart/form-data"  
        method="post" 
        class="row">

        <div class="col-md-12 form-group">
            <input name="heading" type="text" required
            class="form-control" placeholder="Rubrik" value="<?php echo $heading ?>">
        </div>   
      
        <div class="col-md-12 form-group">
            <textarea name="content" cols="30" rows="5" required
            class="form-control" placeholder="Skriv ett inlägg" value=""><?php echo $content ?></textarea>
        </div>

        <div class="col-md-12 form-group">
            <input name="map" type="text" 
            class="form-control" placeholder="Klistra in länken till karta" value="<?php echo $map ?>">
        </div>   
        
        <br>
        <div class="col-md-12 form-group">
            <input name="video" type="text" 
            class="form-control" placeholder="Klistra in länken till video" value="<?php echo $video ?>">
        </div>  

            
        <br>
        <div class="col-md-12 form-group">
            <input  type="file" 
                    name="image" 
                    id="fileToUpload" 
                    value="<?php echo $image ?>"
                    class="form-control"> <!-- type="file" ger en file-select knapp i input -->
        
        </div>

<!-- 
        <div class="col-md-12 form-group">
       <input type="radio" id="publish" name="publish" value="<?php echo $publish ?>">
       <label for="publish">Publicera</label><br>
       <input type="radio" id="publish" name="publish" value="<?php echo $publish ?>">
       <label for="publish">Avpublicera</label><br>
       </div> -->


        <div class="col-md-12 form-group">
            <input  type="submit" 
                    value="Updatera inlägget"
                    class="btn btn-success form-control">
        </div>
    </form>


<?php
  include_once '../footer.php';
?>

    <?php
require_once '../footer.php';
          // <form action='update.php?id=$id'>
          //   <input type='text' class='form-control' name='name' id='changeName' value='$name'>
          // </form>

          // <a href='update.php?id=$id' class='form-control'>Skicka</a>

?>