 <?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
  <?php $page_title = "Promena naziva ucenika"; ?>

  <?php require 'head.php'; ?>
  <body>


<?php

    $sql="SELECT ime FROM ucenici WHERE id=".$_GET['id'];
    $result = $conn->query($sql);

if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
         $ime_ucenika = $row['ime'];
        }
    
} else {
    echo "0 results";
}

?> 
       <div class="container">
         <div class="row mb-5">
          <div class="col-sm-4"></div>
            <div class="col-sm-4"> <h1> Promeni naziva ucenika </h1><?php echo $ime_ucenika;?>
                                <!--  uzimanje podataka i prebacivanje pomocu GET metode -->
               <form action="<?php echo $_SERVER["PHP_SELF"] . '?'.http_build_query($_GET); ?>" method="POST"> 
                <div class="form-group">
                  <label class="col-form-label" for="formGroupExampleInput">Novi naziv ucenika</label>
                  <input type="text" class="form-control" id="nov_naziv_ucenika" name="nov_naziv_ucenika" placeholder="Novi naziv ucenika">
                </div>
                <button type="submit" class="btn btn-info btn-lg">Promeni naziv ucenika</button>
                                 
              </form>
             <div class="col-sm-4"></div>
           </div>
          </div>                    
       </div>    

<?php
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if(isset($_POST['nov_naziv_ucenika'])){
      $nov_naziv_ucenika = $_POST['nov_naziv_ucenika'];

//updatovanje naziva ucenika u bazi
      $sql = "UPDATE ucenici SET ime='$nov_naziv_ucenika' WHERE id=".$_GET['id'];

      if (mysqli_query($conn, $sql)) {
          echo " Uspesno ste promenili podatke u bazi / novo ime ucenika je: <strong>$nov_naziv_ucenika</strong> <br>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }

    ?> 
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?> 
  </body>
</html>