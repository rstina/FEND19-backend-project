<?php
/**************************************** *
 * filename: index.php
 * author: Stina Englesson & Jing-Jing Lin
 * date 2020-03-27
 * 
 * landing page for admin
**************************************** */

include_once '../db.php';
include_once '../header-admin.php';

?>

<h2>Administrera blogginlägg</h2>

<?php 
include_once '../read.php';
include_once '../footer.php'; 
?>