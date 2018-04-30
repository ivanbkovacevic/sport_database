<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
   <?php $page_title = "Promena naziva kluba"; ?>

  <?php require 'head.php'; ?>
<body>



<?php

    $sql="SELECT ime FROM klub WHERE id=".$_GET['id'];
    $result = $conn->query($sql);

if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
         $ime_klub = $row['ime'];
        }    
}

if(is_null($_GET['id'])){
      header("Location: http://localhost/januar/klub_izlistavanje.php");
     }
       
?> 
       <div class="container">
         <div class="row mb-5">
          <div class="col-sm-4"></div>
            <div class="col-sm-4"> <h1> Promeni naziv kluba <?php   echo " \" $ime_klub \""; ?> </h1>
                                <!--  uzimanje podataka i prebacivanje pomocu GET metode -->
             <form action="<?php echo $_SERVER["PHP_SELF"] . '?'.http_build_query($_GET); ?>" method="POST"> 
              <div class="form-group">
               <label class="col-form-label" for="formGroupExampleInput">Novi naziv kluba</label>
               <input type="text" class="form-control" id="nov_naziv_klub" name="nov_naziv_klub" placeholder="Novi naziv kluba">
              </div>
              <button type="submit" class="btn btn-info btn-lg">Promeni naziv kluba</button>           
            </form>
          <div class="col-sm-4"></div>
        </div>
        </div>                    
       </div>    

<?php
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    if(isset($_POST['nov_naziv_klub'])){
      $nov_naziv_klub = $_POST['nov_naziv_klub'];

//updatovanje naziva kluba u bazi
      $sql = "UPDATE klub SET ime='$nov_naziv_klub' WHERE id=".$_GET['id'];

      if (mysqli_query($conn, $sql)) {
          echo " Uspesno ste promenili podatke u bazi / novo ime kluba je: <strong>$nov_naziv_klub</strong> <br>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }

    ?> 
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?> 
  </body>
</html>