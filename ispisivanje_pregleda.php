<?php require 'konekcija.php'; ?>
<?php require 'helper.php'; ?>

<!doctype html>
<html lang="en">
<?php
$wiget_title = "Ispisivanje pregleda";
$source_page = "ispisivanje_pregleda.php";
?>
  <?php $page_title = "Ispisivanje pregleda"; ?>
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
  $broju = 30;
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

if(!empty($_POST['search_date_pregleda'])){
  $search_date_pregleda = $_POST['search_date_pregleda'];
  $where .= " AND pregled.datum_pregleda LIKE '%{$search_date_pregleda}%' ";
} 




//query koji izlistava spojenu tabelu ucenika i skole
$sql = " 
SELECT 
  ucenici.LBO as lbo, 
  ucenici.ime as ime_ucenika,
  ucenici.godiste as godiste_ucenika,
  ucenici.pol as pol_ucenika, 
  skole.ime as ime_skole, 
  skole.id as id_skole, 
  ucenici.id as id_ucenika, 
  ucenici.datum_upisa as datum_upisa, 
  klub.id as id_klub, 
  klub.ime as ime_kluba,
  pregled.datum_pregleda as datum_pregleda,
  pregled.telesna_visina as telesna_visina,
  pregled.telesna_tezina as telesna_tezina,
  pregled.dtv as dtv,
  pregled.bmi as bmi,
  pregled.procena as procena,
  pregled.li as li,
  pregled.pmax as pmax,
  pregled.p50 as p50,
  pregled.p60 as p60,
  pregled.p70 as p70,
  pregled.p80 as p80,
  pregled.p90 as p90,
  pregled.p as p,
  pregled.ta as ta,
  pregled.primedba as primedba

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
        
  <table id='myTable' class='table table-sm table-hover border border-success'>
   <thead>
   <tr>  
      <th scope='col'>rb</th>
      <th scope='col'>LBO</th>
      <th scope='col'>Ime</th>
      <th scope='col'>Godiste</th>
      <th scope='col'>Pol</th>
      <th scope='col'>Datum prvog upisa</th>
      <th scope='col'>Telesna visina</th>
      <th scope='col'>Telesna tezina</th>
      <th scope='col'>DTV</th>
      <th scope='col'>BMI</th>
      <th scope='col'>Procena</th>
      <th scope='col'>Li</th>
      <th scope='col'>Pmax</th>
      <th scope='col'>P50%</th>
      <th scope='col'>P60%</th>
      <th scope='col'>P70%</th>
      <th scope='col'>P80%</th>
      <th scope='col'>P90%</th>
      <th scope='col'>p</th>
      <th scope='col'>TA</th>
      <th scope='col'>Primedba</th>
      <th scope='col'>Datum pregleda</th>
      <th scope='col'>Status</th>
       <th scope='col'>Uverenje istice</th>
      <th scope='col'>Skola</th>
      <th scope='col'>Klub</th>
    </tr>
  </thead>";

   $today= date('Y-M-d');
   $today_time_stamp= strtotime($today);
      
       

  //ispisivanje red po red
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
        strtotime( $row["datum_pregleda"] ) 
      );

       $datum_isteka = date('Y-M-d', strtotime($row["datum_pregleda"]." + 6 months"));
       $datum_isteka_time_stamp = strtotime($row["datum_pregleda"]." + 6 months");
       $status=uverenje($today_time_stamp,$datum_isteka_time_stamp);

      echo "
      <tr>  
        <td>$rb</td>
        <td>" .$row["lbo"]. "</td>
        <td>". $row["ime_ucenika"]. "</td>
        <td>". $row["godiste_ucenika"]. "</td>
        <td>". $row["pol_ucenika"]. "</td>
        <td>" . $date_upisa . "</td>  
        <td>". $row["telesna_visina"]. "</td>
        <td>". $row["telesna_tezina"]. "</td>
        <td>". $row["dtv"]. "</td>
        <td>". $row["bmi"]. "</td>
        <td>". $row["procena"]. "</td>
        <td>". $row["li"]. "</td>
        <td>". $row["pmax"]. "</td>
        <td>". $row["p50"]. "</td>
        <td>". $row["p60"]. "</td>
        <td>". $row["p70"]. "</td>
        <td>". $row["p80"]. "</td>
        <td>". $row["p90"]. "</td>
        <td>". $row["p"]. "</td>
        <td>". $row["ta"]. "</td>
        <td>". $row["primedba"]. "</td>
        <td>". $date_pregleda . "</td>
        <td>" .$status. "</td>
        <td>". $datum_isteka. "</td>
        <td>". $row["ime_skole"]. "</td>
        <td>". $row["ime_kluba"]. "</td>
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