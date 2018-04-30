<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
<?php
$wiget_title = "Izaberite svoju ulogu:";
$source_page = "dobrodosli.php";
?>
  <?php $page_title = "Dobrodosli"; ?>
  <?php require 'head.php'; ?>

  <body>

            <div class="container-fluid mt-5">
               <div class="jumbotron bg-danger">
              <h1 class="display-3 text-white">DISPANZER ZA SPORTSKU MEDICINU</h1>
               <h1 class="display-3 text-white">OPŠTINE PANČEVO</h1>
              <p class="lead text-white">Pregled sportskih lekarskih uverenja</p>
              <hr class="my-4 bg-white">
              
            </div>

            <div class="row   mx-1 mt-1 mb-3 rounded text-center">
                    <div class="col-sm-4  pt-2 text-black text-center"></div>
                    <div class="col-sm-4 border border-DARK pt-2 text-black text-center"><p><strong> IZABERITE SVOJU ULOGU</strong></p></div>
                    <div class="col-sm-4  pt-2 text-black text-center"></div>
            </div>

            <div class="row   mx-1 mt-1 mb-3 rounded ">
                     <div class="col-sm-4  pt-2 "></div>
                     <div class="col-sm-4  pt-2 ">
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="login_nastavnika.php" class="btn btn-info" role="button">NASTAVNIK</a>
                            <a href="#" class="btn btn-info" role="button">DOKTOR</a>
                            <a href="login_trenera.php" class="btn btn-info" role="button">TRENER</a>
                          </div>
                     </div>
                      <div class="col-sm-4  pt-2 "></div>
</div>



<!--=================================footer========================== -->
<div class="row border border-primary bg-danger mx-1 mt-5 mb-3 rounded ">
  <div class="col-sm-2"></div>
  <div class="col-sm-8 pt-2 text-white text-center"><p> &copy; <?php echo date('Y') ?> Ivan Kovačević - email: ivanbkovacevic@gmail.com  .. Sva prava zadržana</p></div>
  <div class="col-sm-2"></div>
        
</div>



</div><!--contejnerov-->

<!-- ____________________________P H P__________________________???????????????????????? -->



<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?>  
  </body>
</html>