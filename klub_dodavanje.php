<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
<?php $page_title = "Klub dodavanje"; ?>

  <?php require 'head.php'; ?>
  <body>
   
       <div class="container">
        <div class="row mb-5">
         <div class="col-sm-4"></div>
          <div class="col-sm-4"> <h1> Dodaj novi klub</h1>
            <form action="klub_dodavanje.php" method="POST">
             <div class="form-group">
              <label class="col-form-label" for="formGroupExampleInput">Dodaj klub</label>
              <input type="text" class="form-control" id="dodaj_ucenika" name="dodaj_klub" placeholder="Dodaj klub">
             </div>
            <button type="submit" class="btn btn-info btn-lg">Dodaj klub</button> 
            </form>
             <div class="col-sm-4"></div>
            </div>
          </div>                    
       </div>    

<?php


if(isset($_POST['dodaj_klub'])){
  $klub =  mysqli_real_escape_string($conn, $_POST['dodaj_klub']);
}



if (empty($klub)){

  echo "GRESKA: Morate popuniti naziv kluba"."<br>";
}else{

  $sql = "INSERT INTO klub (ime) VALUES ('$klub')";

if (mysqli_query($conn, $sql)) {
    echo " Uspesno ste uneli podatke u bazu / ime novog kluba je: <strong>$klub</strong> <br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

/*$sql = "INSERT INTO klub (ime) VALUES ('$klub')";

if (mysqli_query($conn, $sql)) {
    echo " Uspesno ste uneli podatke u bazu / ime novog kluba je: <strong>$klub</strong> <br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

    ?> 
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?> 
  </body>
</html>