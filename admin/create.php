<?php
/**************************************** *
 * filename: update.php
 * author: Stina Englesson & Jing-Jing Lin
 * date 2020-03-27
 * 
 * create blog-post
**************************************** */
  include_once '../header-admin.php';
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
            
        <br>
        <div class="col-md-12 form-group">
            <input  type="file" 
                    name="image" 
                    id="fileToUpload" 
                    class="form-control"> <!-- type="file" ger en file-select knapp i input -->
        </div>

        <div class="col-md-12 form-group">
       <input type="radio" id="publish" name="publish" value="publish">
       <label for="publish">Publicera</label><br>
       <input type="radio" id="unpublish" name="publish" value="unpublish">
       <label for="publish">Avpublicera</label><br>
       </div>

        <div class="col-md-12 form-group">
            <input  type="submit" 
                    value="Posta inlägget"
                    class="btn btn-success form-control">
        </div>
    </form>

<?php
  include_once '../footer.php';
?>