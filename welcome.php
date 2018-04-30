<?php require 'konekcija.php'; 
   session_start();
     $myusername=$_SESSION['login_user'];?>
     <?php require 'helper.php'; ?>

<!doctype html>
<html lang="en">
<?php
$wiget_title = "Pregledani ucenici";
$source_page = "welcome.php";
?>
  <?php $page_title = "Pregledani ucenici"; ?>
  <?php require 'head.php'; ?>
  
  <body>
      <h1>Dobrodošli <?php echo $myusername; ?></h1> 
      <h2><a href = "logout.php">Odjavi se</a></h2>  

    <script>
function myFunction() {
    location.reload(true);
}
</script>
      
<?php
$today= date('Y-M-d');
$tommorow= date('Y-M-d', strtotime("+ 1 day"));
$isteklo7meseci= date('Y-M-d', strtotime(" - 7 months"));

 

$where = "AND skole.ime='$myusername' AND pregled.datum_pregleda > '$isteklo7meseci' ";

// Setuje sql query na pocetku ...30 je defaultno
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



if(!empty($_POST['search_ucenika'])){
  $search_ucenika = $_POST['search_ucenika'];
  $where .= " AND ucenici.ime LIKE '%{$search_ucenika}%' ";
} 

if(!empty($_POST['search_lbo'])){
  $search_lbo = $_POST['search_lbo'];
  $where .= " AND ucenici.LBO LIKE '%{$search_lbo}%' ";
} 

/*if(!empty($_POST['search_date_pregleda'])){
  $search_date_pregleda = $_POST['search_date_pregleda'];
  $where .= " AND pregled.datum_pregleda BETWEEN '2018/01/19' AND '2018/01/22'  ";
} */
/*BETWEEN #07/04/1996# AND #07/09/1996#
LIKE '%{$search_date_pregleda}%'*/


//query koji izlistava spojenu tabelu ucenika i skole
require 'num_res_show.php'; 
require 'search_bar_skola.php';

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




if ($result->num_rows > 0) {
    // output data of each row
  
  echo " 
  
<div class='table-responsive'>
        
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
    
      <th scope='col'>Datum pregleda</th>
       <th scope='col'>Status</th>
      <th scope='col'>Uverenje istice</th>
     
      

    </tr>
  </thead>";

   $today= date('d-M-Y');
   $today_time_stamp= strtotime($today);
   $today_time_stamp;
       

  //ispisivanje red po red
    $rb=1;
    while($row = $result->fetch_assoc()) {

      $imeid = $row["id_ucenika"];

      //Uzimam datum iz baze i menjam mu format u d-m-Y
      $date_upisa = date(
        'd-M-Y', //format
        strtotime( $row["datum_upisa"] ) 
      );

         $date_pregleda = date(
        'd-M-Y', //format
        strtotime( $row["datum_pregleda"] ) 
      );

       $datum_isteka = date('d-M-Y', strtotime($row["datum_pregleda"]." + 6 months"));
       $datum_isteka_time_stamp = strtotime($row["datum_pregleda"]." + 6 months");

       $status=uverenje($today_time_stamp,$datum_isteka_time_stamp);
       /*uverenje je funkcija*/

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
    
        <td>". $date_pregleda . "</td>
         <td>" .$status. "</td>
        <td>". $datum_isteka. "</td>
       
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