<?php
  require_once '../db.php';
  require_once '../header-admin.php';

  $id = htmlentities($_GET['id']);

  // hämtar info fron blog-tabell, alla kolumner på en specifik rad
  $sql = 'SELECT * FROM blog WHERE id = :id';

  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $heading = htmlspecialchars($row['heading']);
  $content = htmlspecialchars($row['content']);
  $map = ($row['map']);
  $video = ($row['video']);
  $image = htmlspecialchars($row['image']);
//   //$publish = htmlspecialchars($row['publish']);
//   echo "<pre>";
//   print_r($row);
//   echo "</pre>";
if(empty($image)){
    echo "<h1>Uppdatera blogginlägg</h1>";
} else {
    echo "<h1>Uppdatera blogginlägg</h1>
    <img src='../images/$image' alt='' width='200px'><br>";
}

?>

<form   action="update.php?id=<?php echo $id;?>"       
        enctype="multipart/form-data"  
        accept-charset="UTF-800"
        method="post" 
        class="row">

    <div class="col-md-12 form-group">
        <input  name="heading"
                type="text" 
                required
                class="form-control" 
                placeholder="Rubrik" 
                value="<?php echo $heading ?>">
    </div>   
      
    <div class="col-md-12 form-group">
        <textarea   name="content" 
                    cols="30" 
                    rows="5" 
                    required
                    class="form-control" 
                    placeholder="Skriv ett inlägg" 
                    value=""><?php echo $content ?></textarea>
    </div>

    <div class="col-md-12 form-group">
        <input  name="map" 
                type="text" 
                class="form-control" 
                placeholder="Klistra in länken till karta"
                value="<?php echo $map ?>">
    </div>   
        
    <br>
    <div class="col-md-12 form-group">
        <input  name="video" 
                type="text" 
                class="form-control" 
                placeholder="Klistra in länken till video" 
                value="<?php echo $video ?>">
    </div>
    
    <br>
    <div class="col-md-12 form-group">
        <input  type="file" 
                    name="image" 
                    id="fileToUpload" 
                    class="form-control"> <!-- type="file" ger en file-select knapp i input -->
    </div>

    

<!--    <div class="col-md-12 form-group">
       <input type="radio" id="publish" name="publish" value="<?php echo $publish ?>">
       <label for="publish">Publicera</label><br>
       <input type="radio" id="publish" name="publish" value="<?php echo $publish ?>">
       <label for="publish">Avpublicera</label><br>
       </div> -->


    <div class="col-md-12 form-group">
        <input  type="submit" 
                value="Uppdatera inlägg"
                class="btn btn-success form-control">
    </div>
</form>

<?php
    require_once '../footer.php';
?>