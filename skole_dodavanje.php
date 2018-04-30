<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
<?php $page_title = "Skole dodavanje"; ?>

  <?php require 'head.php'; ?>
  <body>
   
       <div class="container">
        <div class="row mb-5">
         <div class="col-sm-4"></div>
          <div class="col-sm-4"> <h1> Dodaj novu skolu</h1>
            <form action="skole_dodavanje.php" method="POST">
             <div class="form-group">
              <label class="col-form-label" for="formGroupExampleInput">Dodaj skolu</label>
              <input type="text" class="form-control" id="dodaj_ucenika" name="dodaj_skolu" placeholder="Dodaj ucenika">
             </div>
            <button type="submit" class="btn btn-info btn-lg">Dodaj skolu</button> 
            </form>
             <div class="col-sm-4"></div>
            </div>
          </div>                    
       </div>    

<?php

if(isset($_POST['dodaj_skolu'])){
  $skola =  mysqli_real_escape_string($conn, $_POST['dodaj_skolu']);
}

if(empty($skola)){
  echo "GRESKA: Morate popuniti naziv skole"."<br>";
} 
else{

$sql = "INSERT INTO skole (ime) VALUES ('$skola')";

if (mysqli_query($conn, $sql)) {
    echo " Uspesno ste uneli podatke u bazu / ime nove skole je: <strong>$skola</strong> <br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
    ?> 
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?> 
  </body>
</html>