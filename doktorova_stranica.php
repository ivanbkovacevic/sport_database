<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
<?php
$wiget_title = "Unos podataka prilikom pregleda";
$source_page = "doktorova_stranica.php";
?>
  <?php $page_title = "Doktorova stranica"; ?>
  <?php require 'head.php'; ?>

  <?php $id = $_GET['id']; 
  echo $id;?>
  <body>

            <div class="container-fluid mt-5">
               <div class="jumbotron bg-danger">
              <h1 class="display-3 text-white">DISPANZER ZA SPORTSKU MEDICINU</h1>
              <p class="lead text-white">Unos podataka pregledanih sportista</p>
              <hr class="my-4 bg-white">
            </div>

<form action="<?php echo $_SERVER["PHP_SELF"] . '?'.http_build_query($_GET); ?>" method="POST"> 

  <div  id="log" class="container-fluid "> <!--djurdjevi contejner-->
  <div class="d-flex row justify-content-start w-25 mb-3"><div class="input-group">
  <input type="text" class="form-control" placeholder="LBO broj" aria-label="Username" name="LBO" aria-describedby="basic-addon1">
</div>
<br>

  </div>
         <div class="row border border-danger  border-top-0 "> <!--djurdjevi redovi-->
<div class="col-sm-4 mt-3"><div class="input-group">
  <input type="text" class="form-control" placeholder="Prezime" name="Prezime" aria-label="Username" aria-describedby="basic-addon1">
</div>
<br>
</div>
    <div class="form-group"> 
                <label class="col-form-label" for="formGroupExampleInput">Novi naziv kluba ce biti:</label>  
                   <select  class="form-control" id="exampleFormControlSelect2" name="dodaj_klub">
                     <!--  pravljenje dropdown menu i ispisivanje "hvatanje" imena skole i hvatanje ID skole i ubacivanje u values od optiona -->
                       
                       <?php
                      echo delete_record($conn, $table_name, $id);     
                       $sql = "SELECT * FROM ucenici";
                       $result = $conn->query($sql);
                if (!mysqli_query($conn, $sql)) {
                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }  
                          while($row = $results->fetch_assoc()) {
                           echo "<option value=".$row['id'].">". $row['ime']."</option>"; 
                             }
                         ?>
                   </select>
                   <br />
                   <?php
                   $sql = "INSERT INTO ucenici (id,ime) VALUES (300, 'fuckingtest')";

if (mysqli_query($conn, $sql)) {
    echo " Uspesno ste uneli podatke u bazu <br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}?>
<br>
</div>
<div class="col-sm-2 mt-3  "><div class="input-group ">
  <input type="text" class="form-control" placeholder="Godište" name="Godiste" aria-label="Username" aria-describedby="basic-addon1">
</div>
<br>
</div>
<div class="d-flex justify-content-between col-sm-2 mt-3 "><h5>Pol:</h5><div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="Pol" <?php if (isset($Pol) && $Pol=="M") echo "checked";?> value="M"> M
  </label>
</div>
<div class="form-check form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="Pol" <?php if (isset($Pol) && $Pol=="Z") echo "checked";?> value="Ž"> Ž
  </label>
</div>

</div>
         </div> <!--djurdjevi redovi-->

         <!-- ===============================drugi red=======================================-->
   <div class="row border border-danger mt-3 border-top-0 "> <!--djurdjevi redovi-->
<div class="d-flex justify-content-center col-sm-3 h-50 mt-3 "><div class="input-group w-50">
  <input type="text" class="form-control" placeholder="Telesna visina" name="TV" aria-label="Username" aria-describedby="basic-addon1">
</div>
<br>
</div>
<div class="d-flex justify-content-center col-sm-3 h-50 mt-3 "><div class="input-group w-50">
  <input type="text" class="form-control" placeholder="Telesna težina" name="TT" aria-label="Username" aria-describedby="basic-addon1">
</div>
<br>
</div>
<div class="col-sm-3 mt-3 "><div class="input-group w-50">
  <input type="text" class="form-control" placeholder="Pritisak 1" name="P1" aria-label="Username" aria-describedby="basic-addon1">
</div>
<br>
</div>
<div class="col-sm-3 mt-3"><div class="input-group w-50">
  <input type="text" class="form-control" placeholder="Pritisak 2" name="P2" aria-label="Username" aria-describedby="basic-addon1">
</div>
<br>
</div>
         </div> <!--djurdjevi redovi-->
<!--========================kraj drugog reda===================================================-->

 <div class="row border border-danger mt-3 border-top-0 "> <!--djurdjevi redovi-->
<div class="d-flex justify-content-center col-sm-3 h-50 mt-3 ">
  <div class="form-group">
      <label for="exampleFormControlSelect1">Škola/Firma</label>
      <select class="form-control" placeholder="Škola/Firma" name="Skola" id="exampleFormControlSelect1">
        <option>Isidora Sekulić</option>
        <option>Sveti Sava</option>
        <option>Branko Radičević</option>
        <option>Mika Antić</option>
        <option>eqeeee</option>
        <option>eweeerrr</option>
        <option>ereet</option>
        <option>eteyyyyy</option>
        <option>eyeegggggg</option>
      </select>
    </div>
<br>
</div>
<div class="d-flex justify-content-center col-sm-3 h-50 mt-3 ">
   <div class="form-group">
      <label for="exampleFormControlSelect1">Klub</label>
      <select class="form-control" placeholder="Klub" name="Klub" id="exampleFormControlSelect1">
        <option>Badminton klub "Pančevo"</option>
        <option>Triatlon klub "Tamiš"</option>
        <option>Plivački klub "Dinamo"</option>
        <option>Atletski klub "Dinamo"</option>
        <option>eqeeee</option>
        <option>eweeerrr</option>
        <option>ereet</option>
        <option>eteyyyyy</option>
        <option>eyeegggggg</option>
      </select>
    </div>
<br>
</div>
<div class="col-sm-3 mt-3 "><div class="input-group w-50">
  <input type="text" class="form-control" placeholder="nesto" name="Proba" aria-label="Username" aria-describedby="basic-addon1">
</div>
<br>
</div>

<br>
</div>
         </div>


<!--=========================================pocetak dugmadi=====================0 -->

<div class="d-flex  justify-content-start  mt-3">
  <div class="col-sm-3"></div>
  <div class="col-sm-6 mx-3 "> <button type="submit" class="btn btn-success mx-5 btn-lg">Unesi u tabelu</button>
    
    <button type="submit" class="btn btn-warning mx-5 btn-lg">Unesi u bazu</button>
    </div>
  <div class="col-sm-3"></div>

</div>

</div>  <!--djurdjevi contejner-->
</form>


<!--=================================footer========================== -->
<div class="row border border-primary bg-danger mx-1 mt-5 mb-3 rounded ">
  <div class="col-sm-2"></div>
  <div class="col-sm-8 pt-2 text-white text-center"><p> &copy; 2018. Ivan Kovačević - email: ivanbkovacevic@gmail.com  .. Sva prava zadržana</p></div>
  <div class="col-sm-2"></div>
        
</div>



</div><!--contejnerov-->

<!-- ____________________________P H P__________________________???????????????????????? -->



<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?>  
  </body>
</html>