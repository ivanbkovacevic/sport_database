<?php 
echo " 
<div class='form-group'> 
              <label for='exampleFormControlSelect2'>Izaberi ucenikov klub</label>
              <select  class='form-control' id='exampleFormControlSelect2' name='search_klub'>
                               <!--  pravljenje dropdown menu i ispisivanje 'hvatanje' imena kluba i hvatanje ID kluba i ubacivanje u values od optiona -->
                      
                $results= selectAllFromTable($conn,'klub');
                while($row = $results->fetch_assoc()) {
                  echo '<option value='.$row['id'].'>'. $row['ime'].'</option>';                  
                                   }
                               ?>
          
               </select>
          </div>";
?>

