<div class='container-flex'>
    <div class='row mb-2'>
      <div class='col-sm-4'></div>
      <div class='col-sm-4'> 
          <form action='$source_page' method='POST'>
        
              <div class="form-group">
                    <label>Pronadji ucenika:</label>
                    <input type='text' placeholder='Pronadji ucenika' name='search_ucenika' >
              </div>
              <div class="form-group">
                    <label>Datum upisa:</label>
                    <input type='text' placeholder='Datum upisa' name='search_date_upisa' >
              </div>
              <div class="form-group">   
            <label for="exampleFormControlSelect2">Pronadji po klubu</label>
              <select  class="form-control" id="exampleFormControlSelect2" name="search_klub">
                 <option value="" selected disabled hidden>Pronadji po klubu</option>
                               <!--  pravljenje dropdown menu i ispisivanje "hvatanje" imena skole i hvatanje ID skole i ubacivanje u values od optiona -->
           <?php     
                $results= selectAllFromTable($conn,"klub");
                while($row = $results->fetch_assoc()) {
                  echo "<option value=".$row['ime'].">". $row['ime']."</option>";                  
                                   }
                               ?>

              </select>   
          </div>
             
              <div class="form-group">
                      <label>Pronadji godiste:</label>
                     <input type='number'  min='19' max='2050'  name='search_godiste' placeholder='2010'>
               </div>
              <div class="form-group">
                   <label>Pronadji pol:</label>
                   <input type='text' placeholder='pronadji pol' name='search_pol' >
                </div>             
              <div class="form-group">   
            <label for="exampleFormControlSelect2">Pronadji po skoli</label>
              <select  class="form-control" id="exampleFormControlSelect2" name="search_skola">
                <option value="" selected disabled hidden>Pronadji po skoli</option>
                               <!--  pravljenje dropdown menu i ispisivanje "hvatanje" imena skole i hvatanje ID skole i ubacivanje u values od optiona -->
           <?php     
                $results= selectAllFromTable($conn,"skole");
                while($row = $results->fetch_assoc()) {
                  echo "<option value=".$row['ime'].">". $row['ime']."</option>";                  
                                   }
                               ?>

              </select>   
          </div>         
             <div class="form-group">
                    <label>Datum pregleda od:</label>
                    <input type='date' placeholder='Datum pregleda' name='search_date_pregleda_od' >
                </div>
             <div class="form-group">
                    <label>Datum pregleda do:</label>
                    <input type='date' placeholder='Datum pregleda' name='search_date_pregleda_do' >
                </div>   
                <div>          
                   <input type='submit' value='Pronadji'>
              </div>
          </form>
        </div> 
      </div>      
    <div class='col-sm-4'></div>
    </div>
  </div>                    
</div> 


