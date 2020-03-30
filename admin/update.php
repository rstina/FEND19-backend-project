<?php
/**************************************** *
 * filename: update.php
 * author: Stina Englesson & Jing-Jing Lin
 * date 2020-03-27
 * 
 * update blog-post
**************************************** */

include_once '../header-admin.php';

require_once '../db.php';

if(isset($_GET['id'])){
  $id = htmlspecialchars($_GET['id']);
  $sql = "SELECT * FROM blog WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id' , $id );
  $stmt->execute();

  if($stmt->rowCount() > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $heading  = $row['heading'];
    $image = $row['image'];
    $content = $row['content'];
    $date = $row['date'];
    $map = $row['map'];
    $video = $row['video'];
    $publish = $row['publish'];


  }else{
    header('Location:index.php');
    exit;
  }

}else{
  header('Location:index.php');
  exit;
}

// 2. Uppdatera databasen (raden) med ny data från formuläret

if($_SERVER['REQUEST_METHOD'] === 'POST'){

 $heading = htmlspecialchars($_POST['heading']);
  $content = htmlspecialchars($_POST['content']);
  $map = htmlspecialchars($_POST['map']);
  $video = htmlspecialchars($_POST['video']);
  $image = htmlspecialchars(basename( $_FILES["image"]["name"]));
  $publish = htmlspecialchars($_POST['publish']);


  $sql = "UPDATE blog
          SET heading = :heading, content = :content , map = :map , video = :video , image = :image , publish = :publish   
          WHERE id = :id";

  $stmt = $db->prepare($sql);

  $stmt->bindParam(':heading', $heading);
  $stmt->bindParam(':content' , $content);
  $stmt->bindParam(':map'  , $map);
  $stmt->bindParam(':video'  , $video);
  $stmt->bindParam(':image'  , $image);
  $stmt->bindParam(':publish'  , $publish);

  $stmt->execute();
  header('Location:index.php');
  exit;
}

?>



<h1>Uppdatera blogginlägg</h1>

<form   action="upload.php"       
        enctype="multipart/form-data"  
        method="post" 
        class="row">

        <div class="col-md-12 form-group">
            <input name="heading" type="text" required
            class="form-control" placeholder="Rubrik" value="<?php echo $heading ?>">
        </div>   
      
        <div class="col-md-12 form-group">
            <textarea name="content" cols="30" rows="5" required
            class="form-control" placeholder="Skriv ett inlägg" value="<?php echo $content ?>"></textarea>
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
        
        <!-- <br>
        <div class="col-md-12 form-group">
            <input name="video" type="text" required
            class="form-control" placeholder="Ladda upp bild">
        </div>   -->

            
        <br>
        <div class="col-md-12 form-group">
            <input  type="file" 
                    name="image" 
                    id="fileToUpload" 
                    value="<?php echo $image ?>"
                    class="form-control"> <!-- type="file" ger en file-select knapp i input -->
        
        </div>


        <div class="col-md-12 form-group">
       <input type="radio" id="publish" name="publish" value="<?php echo $publish ?>">
       <label for="publish">Publicera</label><br>
       <input type="radio" id="publish" name="publish" value="<?php echo $publish ?>">
       <label for="publish">Avpublicera</label><br>
       </div>


        <div class="col-md-12 form-group">
            <input  type="submit" 
                    value="Updatera inlägget"
                    class="btn btn-success form-control">
        </div>
    </form>


<?php
  include_once '../footer.php';
?>