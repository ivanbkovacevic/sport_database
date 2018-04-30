  <div class="container">
         <div class="row mb-5">
          <div class="col-sm-4"></div>
            <div class="col-sm-4"> <h1> Promeni naziv <?php echo $h1title?> <?php   echo " \" $ime_skole \" "; ?> </h1>
                                <!--  uzimanje podataka i prebacivanje pomocu GET metode -->
             <form action="<?php echo $_SERVER["PHP_SELF"] . '?'.http_build_query($_GET); ?>" method="POST"> 
              <div class="form-group">
               <label class="col-form-label" for="formGroupExampleInput">Novi naziv skole</label>
               <input type="text" class="form-control" id="nov_naziv_skola" name="nov_naziv_skola" placeholder="Novi naziv skole">
              </div>
              <button type="submit" class="btn btn-info btn-lg">Promeni naziv <?php echo $h1title?></button>           
            </form>
          <div class="col-sm-4"></div>
        </div>
        </div>                    
       </div> 