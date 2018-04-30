<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
  <?php $page_title = "Brisanje skole"; ?>

  <?php require 'head.php'; ?>
  <body>

    <?php 
       $id= $_GET['id'];
       $table_name = $_GET['table_name'];

       echo delete_record($conn, $table_name, $id);
    ?>
   

    <?php require 'zatkonekcija.php'; ?>
    <?php require 'bootscript.php'; ?> 
  </body>
</html>