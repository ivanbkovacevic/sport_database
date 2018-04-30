<?php require 'konekcija.php'; ?>

<?php

  $sql="SELECT ime FROM ucenici WHERE id=".$_GET['id'];
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $ime_koje_menjamo = $row["ime"];

    }
} else {
    echo "0 results";
}

 ?>

  <?php
           
                
                               
/*    $sql = "SELECT * FROM skole";
    $result = $conn->query($sql);
    
if (mysqli_query($conn, $sql)) {
    echo " :"  ."<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

  if(isset($_POST['nov_naziv_ucenika'])){
      $ime_ucenika = $_POST['nov_naziv_ucenika'];
}

?>

<!-- ================================================================================================= -->

<!doctype html>
<html lang="en">
<?php $page_title = "Sportski lekarski pregled"; ?>
<?php require 'head.php'; ?>

  <body>
       <div class="container">
          <div class="row mb-5">
            <div class="col-sm-4"></div>
              <div class="col-sm-4"> <h5 style="border: 1px solid gray"> Izaberi LBO: </h5>
              
                      <!--  uzimanje podataka i prebacivanje pomocu GET metode -->
           <form action="sportski_pregled.php" method="POST"> 
             <div class="form-group">  
                  <label class="col-form-label" for="formGroupExampleInput">Novi naziv skole ce biti:</label> 
                   <select  class="form-control" id="exampleFormControlSelect2" name="dodaj_skolu">
                     <!--  pravljenje dropdown menu i ispisivanje "hvatanje" imena skole i hvatanje ID skole i ubacivanje u values od optiona -->
                       <?php   $results= selectAllFromTable($conn,"skole");
                          while($row = $results->fetch_assoc()) {
                           echo "<option value=".$row['id'].">". $row['ime']."</option>"; 
                             }
                         ?>
                   </select>
                  </div>
                    <div class="form-group">
                      <label class="col-form-label" for="formGroupExampleInput">Novi naziv ucenika ce biti:</label>
                      <input type="text" class="form-control" id="nov_naziv_ucenika" name="nov_naziv_ucenika" placeholder="Novi naziv ucenika">
                    </div>
   <div class="form-group">  
                  <label class="col-form-label" for="formGroupExampleInput">Novi naziv skole ce biti:</label> 
                   <select  class="form-control" id="exampleFormControlSelect2" name="dodaj_skolu">
                     <!--  pravljenje dropdown menu i ispisivanje "hvatanje" imena skole i hvatanje ID skole i ubacivanje u values od optiona -->
                       <?php   $results= selectAllFromTable($conn,"skole");
                          while($row = $results->fetch_assoc()) {
                           echo "<option value=".$row['id'].">". $row['ime']."</option>"; 
                             }
                         ?>
                   </select>
                  </div>
               

                <div class="form-group"> 
                <label class="col-form-label" for="formGroupExampleInput">Novi naziv kluba ce biti:</label>  
                   <select  class="form-control" id="exampleFormControlSelect2" name="dodaj_klub">
                     <!--  pravljenje dropdown menu i ispisivanje "hvatanje" imena skole i hvatanje ID skole i ubacivanje u values od optiona -->
                       <?php   $results= selectAllFromTable($conn,"klub");
                          while($row = $results->fetch_assoc()) {
                           echo "<option value=".$row['id'].">". $row['ime']."</option>"; 
                             }
                         ?>
                   </select>
                   <br />
                   <button type="submit" class="btn btn-info btn-lg">Promeni sve</button>
                  </div>
                </div>
              
           </form>
           </div>

                    <div class="col-sm-4"></div>    
           </div>                    
       </div>   
      
<?php
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++==================================================

    if(isset($_POST['dodaj_skolu'])){
      $skola = $_POST['dodaj_skolu'];
}
          
                              

          if(isset($_POST['dodaj_klub'])){
      $klub = $_POST['dodaj_klub'];
}
       /*$klub = $_POST['dodaj_klub'];*/
//updatovanje naziva skole u bazi
      $sql = "UPDATE ucenici SET ime='$ime_ucenika', skola_id='$skola', klub_id='$klub' WHERE id=".$_GET['id'] ;
      if (mysqli_query($conn, $sql)) {

          echo " Uspesno ste promenili podatke u bazi / novo ime ucenika je: <strong>$ime_ucenika</strong> iz skole sa id" .$skola.   "<br>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

    ?>
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?> 
  </body>
</html>