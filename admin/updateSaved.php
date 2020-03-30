<?php
/**************************************** *
 * filename: update.php
 * author: Stina Englesson & Jing-Jing Lin
 * date 2020-03-27
 * 
 * update blog-post
**************************************** */

require_once '../header-admin.php';

require_once '../db.php';

if(isset($_GET['id'])){
  echo "method: get";
  $id = htmlspecialchars($_GET['id']);
  $sql = "SELECT * FROM blog WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id' , $id );
  $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($row);
    echo "</pre>";
    $heading = htmlspecialchars($row['heading']);
    $content = htmlspecialchars($row['content']);
    $map = htmlspecialchars($row['map']);
    $video = htmlspecialchars($row['video']);
    $image = htmlspecialchars($row['image']);
    $publish = htmlspecialchars($row['publish']);
  
  
    // $sql = "UPDATE blog
    //         SET heading = :heading, 
    //         content = :content , 
    //         map = :map , 
    //         video = :video , 
    //         image = :image , 
    //         publish = :publish 
    //         WHERE id = :id";
  
    // $stmt = $db->prepare($sql);
  
    $sql = "UPDATE blog
    SET heading = '$heading'
    WHERE id = $id;";
    
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':heading', $heading);
    $stmt->bindParam(':content' , $content);
    $stmt->bindParam(':map'  , $map);
    $stmt->bindParam(':video'  , $video);
    $stmt->bindParam(':image'  , $image);
    $stmt->bindParam(':publish'  , $publish);


    echo "heading: ".$heading."<br>id: ".$id; 
    // $newName = htmlentities($_POST['name']);


    $stmt = $db->prepare($sql);
    $stmt->execute();
}




?>

<h1>Uppdatera blogginlägg</h1>

<form   action=""       
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