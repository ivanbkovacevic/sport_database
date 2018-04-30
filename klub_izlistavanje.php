<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">

<?php $page_title = "Klub izlistavanje"; ?>
<?php require 'head.php'; ?>

  <body>
    <script>
function myFunction() {
    location.reload(true);
}
</script>
    
 <?php
// $skola = $_POST['dodaj_skolu'];
if(isset($_POST['broju'])){
  $broju = $_POST['broju'];
} 
else{
 $broju = 100;
}

$sql = "SELECT * FROM klub LIMIT $broju";
$result = $conn->query($sql);

    $wiget_title = "Klubovi koji se nalaze u bazi";
    $source_page = "klub_izlistavanje.php";
require 'num_res_show.php';

if ($result->num_rows > 0) {
    // output data of each row
  echo " 

<div class='container'> 
 <div class='row'>   
  <div class='col-8 col-md-offset-2'>        
<table id='myTable' class='table table-hover border border-success'>
<thead>
   <tr>  
      <th scope='col'>rb</th>
      <th scope='col'>ID</th>
      <th scope='col'>Ime</th>
      <th scope='col'>Izmeni</th>
      <th scope='col'>Obrisi</th>
  </tr>
</thead>";
echo "<tbody>";
    $rb=1;
    while($row = $result->fetch_assoc()) {
        echo " 
        <tr>  
        <td>$rb</td>   
        <td>". $row["id"]. "</td>
        <td>". $row["ime"]. "</td>
        <td> <a target='_blank' href='promena_naziva_klub.php?id=". $row["id"]." '>Promeni ime kluba</a> </td>
        <td> <a target='_blank' href='brisanje_klub.php?id=". $row["id"]."&table_name=klub '>Obrisi klub</a> </td>
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

