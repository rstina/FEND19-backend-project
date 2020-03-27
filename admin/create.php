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

<form action="#" method="post" class="row">
        <div class="col-md-12 form-group">
            <input name="heading" type="text" required
            class="form-control" placeholder="Rubrik">
        </div>   
      
        <div class="col-md-12 form-group">
            <textarea name="content" cols="30" rows="5" required
            class="form-control" placeholder="Skriv ett inlägg"></textarea>
        </div>

        <div class="col-md-12 form-group">
            <input name="map" type="text" required
            class="form-control" placeholder="Klistra in länken till karta">
        </div>   
        
        <br>
        <div class="col-md-12 form-group">
            <input name="video" type="text" required
            class="form-control" placeholder="Klistra in länken till video">
        </div>  
        
        <br>
        <div class="col-md-12 form-group">
            <input name="video" type="text" required
            class="form-control" placeholder="Ladda upp bild">
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