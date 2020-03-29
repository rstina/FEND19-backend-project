<?php
/**************************************** *
 * filename: update.php
 * author: Stina Englesson & Jing-Jing Lin
 * date 2020-03-27
 * 
 * create blog-post
**************************************** */

  include_once '../header-admin.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    // Testa att skriva ut data som finns i POST-arrayen
    // print_r($_POST);
    
    // Lägg till htmlspecialchars för att rensa HTML
    $heading = htmlspecialchars($_POST['heading']);
    $content = htmlspecialchars($_POST['content']);
    $map = htmlspecialchars($_POST['map']);
    $video = htmlspecialchars($_POST['video']);

    // Logga in i databasen
    require_once 'db.php';

    // Förbered en SQL-sats
    $sql = "INSERT INTO blog (heading,content,map, video) 
            VALUES ( :heading, :content, :map, :video)";
    $stmt = $db->prepare($sql);

    // Binda variabler till params, som finns i VALUES
    $stmt->bindParam(':heading' , $heading);
    $stmt->bindParam(':content' , $content);
    $stmt->bindParam(':map' , $map);
    $stmt->bindParam(':video' , $video);


    // Skicka SQL till databasen
    $stmt->execute();

endif;

?>

<h1>Skapa blogginlägg</h1>

<form   action="upload.php"       
        enctype="multipart/form-data"  
        method="post" 
        class="row">

        <div class="col-md-12 form-group">
            <input name="heading" type="text" required
            class="form-control" placeholder="Rubrik">
        </div>   
      
        <div class="col-md-12 form-group">
            <textarea name="content" cols="30" rows="5" required
            class="form-control" placeholder="Skriv ett inlägg"></textarea>
        </div>

        <div class="col-md-12 form-group">
            <input name="map" type="text" 
            class="form-control" placeholder="Klistra in länken till karta">
        </div>   
        
        <br>
        <div class="col-md-12 form-group">
            <input name="video" type="text" 
            class="form-control" placeholder="Klistra in länken till video">
        </div>  
        
        <!-- <br>
        <div class="col-md-12 form-group">
            <input name="video" type="text" required
            class="form-control" placeholder="Ladda upp bild">
        </div>   -->

        <br>
        <div class="col-md-12 form-group">
        <input  type="file" 
                name="fileToUpload" 
                id="fileToUpload" 
                class="form-control"> <!-- type="file" ger en file-select knapp i input -->
        </div>

        <div class="col-md-12 form-group">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="publish"
         checked>
         <label class="form-check-label" for="publish">Publicera</label>
          </div>

        <div class="col-md-12 form-group">
            <input type="submit" value="Posta inlägget"
            class="btn btn-success form-control">
        </div>
    </form>

<?php
  include_once '../footer.php';
?>