<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
    <?php $page_title = "Ucenici dodavanje"; ?>

  <?php require 'head.php'; ?>
  <body>
   
<?php
//selektovanje svega iz table skole
   /* $sql = "SELECT * FROM skole";*/
   
    
/*    $result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    echo "  <br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/


?>
 <div class="container">
  <div class="row mb-5">
  <div class="col-sm-4"></div>
    <div class="col-sm-4"> <h1> Dodaj novog ucenika</h1><span class="fa fa-address-card-o" style="font-size:36px"></span>
      <form action="ucenici_dodavanje.php" method="POST">
          <div class="form-group">
              <label class="col-form-label" for="formGroupExampleInput">LBO ucenika </label>
              <input type="text" class="form-control" id="dodaj_ucenika" name="lbo_ucenika" placeholder="LBO ucenika">
          <div class="form-group">
              <label class="col-form-label" for="formGroupExampleInput">Ime novog ucenika </label>
              <input type="text" class="form-control" id="dodaj_ucenika" name="dodaj_ucenika" placeholder="Dodaj ucenika">
                    <div class="form-group">
                    <label class="col-form-label" for="formGroupExampleInput">Godiste ucenika </label>
                    <input type="number"  min='1930' max='2050'class="form-control" id="godiste_ucenika"  name="godiste_ucenika" placeholder="2018">
                          <div class="d-flex justify-content-between col-sm-2 mt-3 ">Pol ucenika:</div>
                          <div class="form-check form-check-inline">
                          <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="pol" <?php if (isset($Pol) && $Pol=="M") echo "checked";?> value="M"> M
                          </label>
                          </div>
                          <div class="form-check form-check-inline">
                          <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="pol" <?php if (isset($Pol) && $Pol=="Z") echo "checked";?> value="Z"> Ž
                          </label>
                          </div>

              
          <div class="form-group">   
            <label for="exampleFormControlSelect2">Izaberi ucenikovu skolu</label>
              <select  class="form-control" id="exampleFormControlSelect2" name="dodaj_skolu">
                 <option value="" selected disabled hidden>Skola</option>
                               <!--  pravljenje dropdown menu i ispisivanje "hvatanje" imena skole i hvatanje ID skole i ubacivanje u values od optiona -->
           <?php     
                $results= selectAllFromTable($conn,"skole");
                while($row = $results->fetch_assoc()) {
                  echo "<option value=".$row['id'].">". $row['ime']."</option>";                  
                                   }
                               ?>

              </select>   
          </div>
        
<!-- =========================================================================================================== -->
   <?php /* $sql = "SELECT * FROM klub";
          $result = $conn->query($sql);
                if (mysqli_query($conn, $sql)) {
                    echo " <br>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }*/ 
                ?>
              <div class="form-group"> 
              <label for="exampleFormControlSelect2">Izaberi ucenikov klub</label>
              <select  class="form-control" id="exampleFormControlSelect2" name="dodaj_klub">
                <option value="" selected disabled hidden>Klub</option>
                               <!--  pravljenje dropdown menu i ispisivanje "hvatanje" imena kluba i hvatanje ID kluba i ubacivanje u values od optiona -->
                 <?php     
                $results= selectAllFromTable($conn,"klub");
                while($row = $results->fetch_assoc()) {
                  echo "<option value=".$row['id'].">". $row['ime']."</option>";                  
                                   }
                               ?>
          
               </select>
          </div>
            <button type="submit" class="btn btn-info btn-lg">Dodaj ucenika</button>  
      </form>
      <div class="col-sm-4"></div>
  </div>
</div>                    
</div>  

<?php
$date = date('Y-M-d');
/*$lbo = $_POST['lbo_ucenika'];
$ucenik = $_POST['dodaj_ucenika'];*/
/*$godiste = $_POST['godiste_ucenika'];*/
/*$pol = $_POST['pol'];*/
/*$skola = $_POST['dodaj_skolu'];*/
/*$klub = $_POST['dodaj_klub'];*/

if(isset($_POST['pol'])){
  $pol =  mysqli_real_escape_string($conn, $_POST['pol']);
}

if(empty($pol)){
  echo "GRESKA: Morate popuniti pol ucenika"."<br>";
  die("Nisu uneti podaci u bazu");
} 


if(isset($_POST['godiste_ucenika'])){
  $godiste =  mysqli_real_escape_string($conn, $_POST['godiste_ucenika']);
}

if(empty($godiste)){
  echo "GRESKA: Morate popuniti godiste ucenika"."<br>";
    die("Nisu uneti podaci u bazu");
} 


if(isset($_POST['lbo_ucenika'])){
  $lbo =  mysqli_real_escape_string($conn, $_POST['lbo_ucenika']);
   
}

if(empty($lbo)){
  echo "GRESKA: Morate popuniti LBO ucenika"."<br>";
    die("Nisu uneti podaci u bazu");
} 

if(isset($_POST['dodaj_ucenika'])){
  $ucenik =  mysqli_real_escape_string($conn, $_POST['dodaj_ucenika']);
}

if(empty($ucenik)){
  echo "GRESKA: Morate popuniti ime ucenika"."<br>";
    die("Nisu uneti podaci u bazu");
} 

if(isset($_POST['dodaj_skolu'])){
  $skola =  mysqli_real_escape_string($conn, $_POST['dodaj_skolu']);
}

if(empty($skola)){
  echo "GRESKA: Morate popuniti skolu ucenika"."<br>";
    die("Nisu uneti podaci u bazu");
}

if(isset($_POST['dodaj_klub'])){
  $klub =  mysqli_real_escape_string($conn, $_POST['dodaj_klub']);
}

if(empty($klub)){
  echo "GRESKA: Morate popuniti klub ucenika"."<br>";
    die("Nisu uneti podaci u bazu");
} 

/*else{
 $pol = $_POST['pol'];
}*/

/*if(empty($_POST['godiste_ucenika'])){
 
  echo "GRESKA: Morate popuniti godiste ucenika"."<br>";
} 
else{
  $godiste = $_POST['godiste_ucenika'];
}*/

/*if(empty($_POST['lbo_ucenika'])){
 
  echo "GRESKA: Morate popuniti LBO ucenika"."<br>";
} 
else{
  $lbo = $_POST['lbo_ucenika'];
}*/



/*if(empty($_POST['dodaj_ucenika'])){
 
  echo "GRESKA: Morate popuniti ime ucenika"."<br>";
} 
else{
 $ucenik = $_POST['dodaj_ucenika'];
}*/

 
/*
if(empty($_POST['dodaj_skolu'])){
 
  echo "GRESKA: Morate popuniti skolu ucenika"."<br>";
} 
else{
 $skola = $_POST['dodaj_skolu'];
}*/


/*
if(empty($_POST['dodaj_klub'])){
 
  echo "GRESKA: Morate popuniti klub ucenika"."<br>";
} 
else{
 $klub = $_POST['dodaj_klub'];
}*/


 
$sql = "INSERT INTO ucenici (
  LBO,
  ime,
  godiste, 
  pol, 
  skola_id, 
  klub_id, 
  datum_upisa) 
VALUES ('$lbo',
  '$ucenik',
  $godiste,
  '$pol',
  '$skola', 
  '$klub', 
  STR_TO_DATE('$date', '%Y/%M/%d'))";

$sql1 ="SELECT ime FROM skole WHERE id=$skola";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          $skola_naziv = $row["ime"];
        }
    
} else {
    echo "0 results";
}


if (mysqli_query($conn, $sql)) {
    echo " Uspesno ste uneli podatke u bazu / ime novog ucenika je: <strong>$ucenik</strong>  Iz skole <strong>$skola_naziv</strong> <br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    ?> 
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php';


 ?> 


  </body>
</html>