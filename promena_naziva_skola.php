<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
   <?php $page_title = "Promena naziva skola"; ?>

  <?php require 'head.php'; ?>
<body>



<?php

    $sql1="SELECT ime FROM skole WHERE id=".$_GET['id'];
    $result = $conn->query($sql1);

if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
         $ime_skole = $row['ime'];
        }    
}

if(is_null($_GET['id'])){
      header("Location: http://localhost/januar/skole_izlistavanje.php");
     }
       
?> 
       <div class="container">
         <div class="row mb-5">
          <div class="col-sm-4"></div>
            <div class="col-sm-4"> <h1> Promeni naziv skole <?php   echo " \" $ime_skole \""; ?> </h1>
                                <!--  uzimanje podataka i prebacivanje pomocu GET metode -->
             <form action="<?php echo $_SERVER["PHP_SELF"] . '?'.http_build_query($_GET); ?>" method="POST"> 
              <div class="form-group">
               <label class="col-form-label" for="formGroupExampleInput">Novi naziv skole</label>
               <input type="text" class="form-control" id="nov_naziv_skola" name="nov_naziv_skola" placeholder="Novi naziv skole">
              </div>
              <button type="submit" class="btn btn-info btn-lg">Promeni naziv skole</button>           
            </form>
          <div class="col-sm-4"></div>
        </div>
        </div>                    
       </div>    

<?php
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if(isset($_POST['nov_naziv_skola'])){
      $nov_naziv_skola = $_POST['nov_naziv_skola'];

//updatovanje naziva skole u bazi
      $sql = "UPDATE skole SET ime='$nov_naziv_skola' WHERE id=".$_GET['id'];

      if (mysqli_query($conn, $sql)) {
          echo " Uspesno ste promenili podatke u bazi / novo ime skole je: <strong>$nov_naziv_skola</strong> <br>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }

    ?> 
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?> 
  </body>
</html>