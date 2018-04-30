<?php require 'konekcija.php'; ?>
<?php require 'helper.php'; ?>

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
  $broju = "30";
}

if(!empty($_POST['search_godiste'])){
  $search_godiste = $_POST['search_godiste'];
  $where .= " AND ucenici.godiste LIKE '%{$search_godiste}%' ";
} 

if(!empty($_POST['search_pol'])){
  $search_pol = $_POST['search_pol'];
  $where .= " AND ucenici.pol LIKE '%{$search_pol}%' ";
} 

if(!empty($_POST['search_date_upisa'])){
  $search_date_upisa = $_POST['search_date_upisa'];
  $where .= " AND ucenici.datum_upisa LIKE '%{$search_date_upisa}%' ";
} 

if(!empty($_POST['search_skola'])){
  $search_skola = $_POST['search_skola'];
  $where .= " AND skole.ime LIKE '%{$search_skola}%' ";
} 

if(!empty($_POST['search_klub'])){
  $search_klub = $_POST['search_klub'];
  $where .= " AND klub.ime LIKE '%{$search_klub}%' ";
} 

if(!empty($_POST['search_ucenika'])){
  $search_ucenika = $_POST['search_ucenika'];
  $where .= " AND ucenici.ime LIKE '%{$search_ucenika}%' ";
} 


if(!empty($_POST['search_date_pregleda_od'])){
  $search_date_pregleda_od = $_POST['search_date_pregleda_od'];
   $search_date_pregleda_od.="T00:01";
/*  $search_date_pregleda_od = strtotime($search_date_pregleda_od);
  $search_date_pregleda_od = date('Y-M-d H:i:s');*/
  $where .= " AND pregled.datum_pregleda >= '{$search_date_pregleda_od}' ";
} 

if(!empty($_POST['search_date_pregleda_do'])){
  $search_date_pregleda_do = $_POST['search_date_pregleda_do'];
   $search_date_pregleda_do.="T23:59";
/*  $search_date_pregleda_do = strtotime($search_date_pregleda_do."+1 day");
  $search_date_pregleda_do = date('Y-M-d H:i:s');*/
  $where .= " AND pregled.datum_pregleda <= '{$search_date_pregleda_do} ' ";
} 






//query koji izlistava spojenu tabelu ucenika i skole
$sql = " 
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
  klub.ime as ime_kluba,
  pregled.datum_pregleda as datum_pregleda
FROM ucenici
  INNER JOIN skole ON skole.id=ucenici.skola_id 
  INNER JOIN klub ON klub.id=ucenici.klub_id
  LEFT JOIN pregled ON pregled.ucenici_id=ucenici.id
WHERE 1=1 {$where}
LIMIT $broju";

echo $sql;

$result = $conn->query($sql);

 require 'num_res_show.php'; 
 require 'search_bar.php';


if ($result->num_rows > 0) {
    // output data of each row
  
  echo " 
  
<div class='table-responsive'>
  <div class='row'>   
  <div class='col-12'>            
  <table id='myTable' class='table table-sm table-hover border border-success'>
   <thead>
   <tr>  
      <th scope='col'>rb</th>
       <th scope='col'>LBO</th>
      <th scope='col'>ID <a  href='ucenici_izlistavanje_silazno.php'> ID Uzlaz</a></th>
      <th scope='col'>Ime</th>
      <th scope='col'>Godiste</th>
      <th scope='col'>Pol</th>
      <th scope='col'>Datum upisa</th>
      
      <th scope='col'>Ime skole</th>
      <th scope='col'>Ime kluba</th>
      <th scope='col'>Datum pregleda</th>
       <th scope='col'>Status</th>
      <th scope='col'>Uverenje istice</th>
     
      <th scope='col'>Akcija 1</th>
      <th scope='col'>Akcija 2</th>
      <th scope='col'>Akcija 3</th>
      <th scope='col'>Brisanje ucenika</th>

    </tr>
  </thead>";

   $today= date('d-M-Y');
   $today_time_stamp= strtotime($today);
   echo $today_time_stamp."<br>";
   echo $today;
   //ispisivanje red po red      
 echo "<tbody>";

    $rb=1;
    while($row = $result->fetch_assoc()) {

      $imeid = $row["id_ucenika"];

      //Uzimam datum iz baze i menjam mu format u d-m-Y
      $date_upisa = date(
        'Y-M-d', //format
        strtotime( $row["datum_upisa"] ) 
      );

         $date_pregleda = date(
        'Y-M-d', //format
        strtotime($row["datum_pregleda"] ) 
      );

       $datum_isteka = date('Y-M-d', strtotime($row["datum_pregleda"]." + 6 months"));
       $datum_isteka_time_stamp = strtotime($date_pregleda." + 6 months");
       $status=uverenje($today_time_stamp,$datum_isteka_time_stamp);

     echo "
      <tr>  
        <td>$rb</td>
        <td>" . $row["LBO"] . "</td>
        <td>" . $imeid . "</td>
        <td>". $row["ime_ucenika"]. "</td>
        <td>". $row["godiste_ucenika"]. "</td>
        <td>". $row["pol_ucenika"]. "</td>
        <td>" . $date_upisa . "</td>   
        <td>". $row["ime_skole"]. "</td>
        <td>". $row["ime_kluba"]. "</td>
        <td>". $date_pregleda . "</td>
         <td>" .$status. "</td>
        <td>". $datum_isteka. "</td>
         <td> <a target='_blank' href='pregled.php?id=". $row["id_ucenika"]."&godiste=". $row["godiste_ucenika"]. "&pol=". $row["pol_ucenika"]. "'>Izvrsi pregled</a> </td>
        <td> <a target='_blank' href='promena_naziva_ucenika.php?id=". $row["id_ucenika"]." '>Promeni ime ucenika</a> </td>
        <td> <a target='_blank' href='kompletna_promena.php?id=". $row["id_ucenika"]." '>Promeni sve podatke</a> </td>
        <td> <a target='_blank' href='brisanje_ucenika.php?id=". $row["id_ucenika"]."&table_name=ucenici '>Obrisi ucenika</a> </td>
      </tr>";

      $rb++; 
    }
    
} else {
    echo "0 results";
}

   echo '  </tbody></table>

 
  </div></div></div>';

    ?> 
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?>   
</body>
</html>


 <!-- <button onclick='myFunction()' class='btn btn-info btn-lg'>Osvezi bazu</button> -->