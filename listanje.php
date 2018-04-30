<?php require 'konekcija.php'; ?>
<?php require 'helper.php'; ?>

<!doctype html>
<html lang="en">
<?php
$wiget_title = "Listanje";
$source_page = "listanje.php";
?>
  <?php $page_title = "Listanje"; ?>
  <?php require 'head.php'; ?>
  
  <body>
  <?php      
$today = time() ;

$sutra = time() + (19*24*60*60);
$sutra_time= strtotime("+ 10 day");
$sutra_datum= date('d-M-Y',  $sutra_time);
$sutra_datum1= date('d-M-Y',  strtotime("+ 10 day"));
$today1 = date('d-M-Y H:i:s');
$today2 = strtotime($today1);

$c = $today + $today2;

echo $c."c"."<br>";
echo $today." today"."<br>";
echo $today2 ." today2"."<br>";

echo $today1." today1"."<br>";
echo $sutra_datum." sutra datum"."<br>";
echo $sutra_datum1." sutra datum1"."<br>";

$today3= date('d-M-Y');
$today_time_stamp3= strtotime($today3);
$isteklo7meseci= date('d-M-Y', strtotime(" + 7 months"));

echo $today3."today3"."<br>";
echo $today_time_stamp3." today_time_stamp3"."<br>";
echo $isteklo7meseci." isteklo7meseci"."<br>";

if($today1<$sutra){
  echo "<br>"."manje je";
}else{
  echo "vece je";
}

    ?> 
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?>   
</body>
</html>


 <!-- <button onclick='myFunction()' class='btn btn-info btn-lg'>Osvezi bazu</button> -->