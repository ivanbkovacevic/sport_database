<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
<?php

$source_page = "pregled.php";
?>
  <?php $page_title = "Pregled"; ?>
  <?php require 'head.php'; ?>

   <?php 

   $id = $_GET['id']; 
   $godiste = $_GET['godiste']; 
   $pol = $_GET['pol']; 

   echo "$id $godiste $pol";
  ?>

 

  <body>
  

 <div class="container-fluid mt-3">
               <div class="jumbotron bg-danger">
              <h1 class="display-3 text-white">DISPANZER ZA SPORTSKU MEDICINU</h1>
              <p class="lead text-white">Unos podataka prilikom pregleda</p>
              <hr class="my-4 bg-white">
            </div>

<div>

   <div class="container mb-3">
   <div class="col-sm-12"> <?php require 'navbar.php'; ?></div>

   </div>
  <?php   

/*$sql = " 
SELECT  
  ucenici.LBO as LBO,
  ucenici.ime as ime_ucenika,
  ucenici.godiste as godiste_ucenika,
  ucenici.pol as pol_ucenika, 
  skole.ime as ime_skole, 
  skole.id as id_skole, 
  ucenici.id as id_ucenika, 
  ucenici.datum_upisa as datum_upisa, 
  klub.id as id_klub, 
  klub.ime as ime_kluba
FROM ucenici
  INNER JOIN skole ON skole.id=ucenici.skola_id 
  INNER JOIN klub ON klub.id=ucenici.klub_id
WHERE ucenici.id=200";

echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h5>
        <strong>LBO:</strong> " . $row["LBO"]." <br>
        <strong>Id:</strong> " . $row["id_ucenika"]."<br>
        <strong>Ime:</strong> ". $row["ime_ucenika"]." 
        <strong>Godiste:</strong> ". $row["godiste_ucenika"]."
        <strong>Iz skole:</strong> ". $row["ime_skole"]."
        <strong>Iz kluba:</strong> ". $row["ime_kluba"]."
        <strong>Pol:</strong> " . $row["pol_ucenika"]."<br></h5>";
    }
} else {
    echo "0 results";
}*/
echo " 
  
					<div class='container-fluid'> 
					        
					  <table id='myTable' class='table table-hover border border-success'>
					   <thead>
					   <tr>        
					       <th scope='col'>LBO</th>
					      <th scope='col'>ID </th>
					      <th scope='col'>Ime</th>
					      <th scope='col'>Godiste</th>
					      <th scope='col'>Pol</th>   
					      <th scope='col'>Ime skole</th>
					      <th scope='col'>Ime kluba</th>
					    </tr>
					  </thead>";
 
  $results= selectAllFromTableZaPregled($conn,$id);
                          while($row = $results->fetch_assoc()) {
                            /*   echo "<h6>
							        <strong>LBO:</strong> " . $row["LBO"]." <br>
							        <strong>Id:</strong> " . $row["id_ucenika"]."<br>
							        <strong>Ime:</strong> ". $row["ime_ucenika"]." <br>
							        <strong>Godiste:</strong> ". $row["godiste_ucenika"]."<br>
							        <strong>Iz skole:</strong> ". $row["ime_skole"]."<br>
							        <strong>Iz kluba:</strong> ". $row["ime_kluba"]."<br>
							        <strong>Pol:</strong> " . $row["pol_ucenika"]."<br></h6>";*/
							    
							echo "
							      <tr>  
							        
							        <td>" . $row["LBO"]."</td>
							        <td>" . $row["id_ucenika"]."</td>
							        <td>". $row["ime_ucenika"]. "</td>
							        <td>". $row["godiste_ucenika"]. "</td>
							        <td>". $row["pol_ucenika"]. "</td>
							        <td>" . $row["ime_skole"]. "</td>
							        <td>". $row["ime_kluba"]."</td>						       
							      </tr>";

							};
							 echo '</table> 
    
                               </div>';
 							
?>

 <div class="container">
  
          <div class="row mb-5">
            <div class="col-sm-4"></div>
              <div class="col-sm-4"> <h5 style="border: 1px solid gray"> Podaci sa pregleda: </h5>
                
                      <!--  uzimanje podataka i prebacivanje pomocu GET metode -->
           <form action="proba.php" target="_blank" method="POST"> 

                      <div class="form-group">
			                      <label class="col-form-label" for="formGroupExampleInput">Godiste ucenika:</label>
			                      <input type="text" class="form-control"  value='<?=$godiste?>' name="godiste" placeholder="id">
                      </div>
                      <div class="form-group">
                            <label class="col-form-label" for="formGroupExampleInput">Pol ucenika:</label>
                            <input type="text" class="form-control"  value='<?=$pol?>' name="pol" placeholder="id">
                      </div>
                      <div class="form-group">
                            <label class="col-form-label" for="formGroupExampleInput">Id ucenika:</label>
                            <input type="text" class="form-control"  value='<?=$id?>' name="id" placeholder="id">
                      </div>
                      <div class="form-group">
			                      <label class="col-form-label" for="formGroupExampleInput">Telesna visina:</label>
			                      <input type="number" class="form-control" min='50' max='260' value='100' name="telesna_visina" placeholder="Telesna visina">
                      </div>
                       <div class="form-group">
                                <label class="col-form-label" for="formGroupExampleInput">Telesna tezina: </label>
                                <input type="number" class="form-control" min='10' max='200' value='50' name="telesna_tezina" placeholder="Telesna tezina">
                       </div>
                          <div class="form-group">
                                <label class="col-form-label" for="formGroupExampleInput">Pritisak: </label>
                                <input type="number" class="form-control" min='30' max='300' value='50' name="pritisak" placeholder="Pritisak">
                          </div>        
                                    

                     <div class="form-group"> 
                              <div class="d-flex justify-content-between col-sm-2 mr-3 "><h5>Primedba: </h5></div>

                             	<div class="form-check form-check-inline">
								  <label class="form-check-label">
								    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="primedba" 
								    <?php if (isset($primedba) && $primedba=="sposoban") echo "checked";?> value="sposoban"> Sposoban/na
								  </label>
								</div>
								<div class="form-check form-check-inline">
								  <label class="form-check-label">
								    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="primedba" 
								    <?php if (isset($primedba) && $primedba=="nesposoban") echo "checked";?> value="nesposoban"> Nesposoban/na
								  </label>
								</div>

                     </div>
                   <br />

                   <button  type="submit" class="btn btn-info btn-lg">Zavrsi pregled</button>
                  </div>
                </div>
              
           </form>
           </div>

                    <div class="col-sm-4"></div>    
           </div>                    
       </div>   	

</div> <!-- contejnerov -->


<?php



       /*insertIntoTable($conn,"pregled", $id, $tv, $tt);*/
      
      
    
?>
			
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?>   
</body>
</html>