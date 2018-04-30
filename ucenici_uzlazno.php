<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
<?php
$wiget_title = "Ucenici koji se nalaze u bazi silazno";
$source_page = "ucenici_izlistavanje_silazno.php";
?>
  <?php $page_title = "Ucenici silazno izlistavanje"; ?>
  <?php require 'head.php'; ?>
  
  <body>
        

    <script>
function myFunction() {
    location.reload(true);
}
</script>
      
<?php

$where = '';

// Setuje sql query na pocetku ...10 je defaultno
if(isset($_POST['broju'])){
  $broju = $_POST['broju'];
} 
else{
  $broju = 10;
}

if(isset($_POST['search_date'])){
  $search_date = $_POST['search_date'];
} 
else{
  $search_date = '1-1-2000';
}

if(isset($_POST['search_skola'])){
  $search_skola = $_POST['search_skola'];
} 
else{
  $search_skola = 'a';
}

if(isset($_POST['search_klub'])){
  $search_klub = $_POST['search_klub'];
} 
else{
  $search_klub = 'b';
}

if(isset($_POST['search_ucenika'])){
  $search_ucenika = $_POST['search_ucenika'];
  $where .= " AND (ucenici.ime LIKE '%{$search_ucenika}%' OR skole.ime LIKE '%{$search_skola}%'  OR ucenici.datum_upisa LIKE '%{$search_date}%' OR klub.ime LIKE '%{$search_klub}%' ) ";

} 

/*if(isset($_POST['date_search'])){
  $date_search = $_POST['date_search'];
} 
else{
  $date_search = 3;
}*/
//query koji izlistava spojenu tabelu ucenika i skole
$sql = "SELECT  ucenici.ime as ime_ucenika, skole.ime as ime_skole, skole.id as id_skole, ucenici.id as id_ucenika, ucenici.datum_upisa as datum_upisa, klub.id as id_klub, klub.ime as ime_kluba
FROM ((ucenici INNER JOIN skole ON skole.id=ucenici.skola_id) INNER JOIN klub ON klub.id=ucenici.klub_id) WHERE 1=1 {$where} ORDER BY datum_upisa DESC LIMIT $broju";

echo $sql;

$result = $conn->query($sql);

 require 'num_res_show.php'; 
 require 'search_bar.php';
                  

if ($result->num_rows > 0) {
    // output data of each row
  
  echo " 
  
<div class='container'> 
        
  <table id='myTable' class='table table-hover border border-success'>
   <thead>
   <tr>  
      <th scope='col'>rb</th>
      <th scope='col'>ID <a  href='ucenici_uzlazno.php'> ID Uzlaz</a></th>
      <th scope='col'>Ime</th>
      <th scope='col'>Datum pregleda</th>
      <th scope='col'>Uverenje istice</th>
      <th scope='col'>Ime skole</th>
      <th scope='col'>Ime kluba</th>
      <th scope='col'>Akcija</th>
      <th scope='col'>Akcija 1</th>
      <th scope='col'>Brisanje ucenika</th>
    </tr>
  </thead>";

  //ispisivanje red po red
    $rb=1;
    while($row = $result->fetch_assoc()) {

      $imeid = $row["id_ucenika"];

      //Uzimam datum iz baze i menjam mu format u d-m-Y
      $date = date(
        'd-M-Y', //format
        strtotime( $row["datum_upisa"] ) 
      );

      echo "
      <tr>  
        <td>$rb</td>
        <td>" . $imeid . "</td>
        <td>". $row["ime_ucenika"]. "</td>
        <td>" . $date . "</td>
        <td>". date('d-M-Y', strtotime($row["datum_upisa"]."+6 months")). "</td>
        <td>". $row["ime_skole"]. "</td>
        <td>". $row["ime_kluba"]. "</td>
        <td> <a target='_blank' href='promena_naziva_ucenika.php?id=". $row["id_ucenika"]." '>Promeni ime ucenika</a> </td>
        <td> <a target='_blank' href='kompletna_promena.php?id=". $row["id_ucenika"]." '>Promeni ime i skolu ucenika</a> </td>
        <td> <a target='_blank' href='brisanje_ucenika.php?id=". $row["id_ucenika"]."&table_name=ucenici '>Obrisi ucenika</a> </td>
      </tr>";

      $rb++; 
    }
    
} else {
    echo "0 results";
}

 echo '</table> 
    
  </div>';

    ?> 
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?>   
</body>
</html>


 <!-- <button onclick='myFunction()' class='btn btn-info btn-lg'>Osvezi bazu</button> -->