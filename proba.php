<?php require 'konekcija.php'; ?>

<!doctype html>
<html lang="en">
<?php

$source_page = "proba.php";
?>
  <?php $page_title = "proba"; ?>
  <?php require 'head.php'; ?>
  
  <body>
        

    <script>
function myFunction() {
    location.reload(true);
}
</script>
<?php
      $godiste = $_POST['godiste'];

      $pol = $_POST['pol'];

      $ucenici_id = $_POST['id'];

      $tv = $_POST['telesna_visina'];

      $tt = $_POST['telesna_tezina'];
   
      $pritisak = $_POST['pritisak'];
      
      $primedba = $_POST['primedba'];


     $broj_godina = date('Y') - $godiste;
     echo $broj_godina. "<br>";

     $proc_dost_tv=1;

     if ($broj_godina<1 && $pol="Z") {
       $proc_dost_tv= 28.6;
     }elseif ($broj_godina==1 && $pol="Z") {
       $proc_dost_tv= 44.8;
     }elseif ($broj_godina==2 && $pol="Z") {
       $proc_dost_tv= 52.2;
     }elseif ($broj_godina==3 && $pol="Z") {
       $proc_dost_tv= 57;
     }elseif ($broj_godina==4 && $pol="Z") {
       $proc_dost_tv= 61.5;
     }elseif ($broj_godina==5 && $pol="Z") {
       $proc_dost_tv= 66;
     }elseif ($broj_godina==6 && $pol="Z") {
       $proc_dost_tv= 71;
     }elseif ($broj_godina==7 && $pol="Z") {
       $proc_dost_tv= 74;
     }elseif ($broj_godina==8 && $pol="Z") {
       $proc_dost_tv= 77.5;
     }elseif ($broj_godina==9 && $pol="Z") {
       $proc_dost_tv= 81;
     }elseif ($broj_godina==10 && $pol="Z") {
       $proc_dost_tv= 84;
     }elseif ($broj_godina==11 && $pol="Z") {
       $proc_dost_tv= 87.2;
     }elseif ($broj_godina==12 && $pol="Z") {
       $proc_dost_tv= 91.7;
     }elseif ($broj_godina==13 && $pol="Z") {
       $proc_dost_tv= 95.5;
     }elseif ($broj_godina==14 && $pol="Z") {
       $proc_dost_tv= 98;
     }elseif ($broj_godina==15 && $pol="Z") {
       $proc_dost_tv= 99;
     }elseif ($broj_godina==16 && $pol="Z") {
       $proc_dost_tv= 100;
     }elseif ($broj_godina==17 && $pol="Z") {
       $proc_dost_tv= 100;
     }elseif ($broj_godina>18 && $pol="Z") {
       $proc_dost_tv= 100;
   
      }elseif ($broj_godina<1 && $pol="M") {
       $proc_dost_tv= 38;
     }elseif ($broj_godina==1 && $pol="M") {
       $proc_dost_tv= 42;
     }elseif ($broj_godina==2 && $pol="M") {
       $proc_dost_tv= 48.6;
     }elseif ($broj_godina==3 && $pol="M") {
       $proc_dost_tv= 53;
     }elseif ($broj_godina==4 && $pol="M") {
       $proc_dost_tv= 57.6;
     }elseif ($broj_godina==5 && $pol="M") {
       $proc_dost_tv= 61.7;
     }elseif ($broj_godina==6 && $pol="M") {
       $proc_dost_tv= 65.5;
     }elseif ($broj_godina==7 && $pol="M") {
       $proc_dost_tv= 69.3;
     }elseif ($broj_godina==8 && $pol="M") {
       $proc_dost_tv= 72;
     }elseif ($broj_godina==9 && $pol="M") {
       $proc_dost_tv= 75;
     }elseif ($broj_godina==10 && $pol="M") {
       $proc_dost_tv= 78.1;
     }elseif ($broj_godina==11 && $pol="M") {
       $proc_dost_tv= 81;
     }elseif ($broj_godina==12 && $pol="M") {
       $proc_dost_tv= 83.8;
     }elseif ($broj_godina==13 && $pol="M") {
       $proc_dost_tv= 87.3;
     }elseif ($broj_godina==14 && $pol="M") {
       $proc_dost_tv= 91.5;
     }elseif ($broj_godina==15 && $pol="M") {
       $proc_dost_tv= 95.5;
     }elseif ($broj_godina==16 && $pol="M") {
       $proc_dost_tv= 98.8;
     }elseif ($broj_godina==17 && $pol="M") {
       $proc_dost_tv= 99.6;
     }elseif ($broj_godina>18 && $pol="M") {
       $proc_dost_tv= 100;
     }
//($broj_godina=18 && $pol="M")
 $dtv= ($tv*100)/$proc_dost_tv;

 echo $proc_dost_tv."<br>";

 echo $dtv."---";

/*      if ($broj_godina<=18) {
         $tv*100/$broj_godina; 0 :18 ;IF($pol ="m";ako je true 2;ako je false 3);FALSE));"")
 
       }else{$xdtv}*/
     
        $bmi = $tt/($tv*$tv)*10000;
      

        if ($bmi<20) {
           $procena="Neuhranjen";
         } elseif ($bmi<24.9) {
           $procena="Normalno";
         }elseif ($bmi<29.9) {
            $procena="1 stepen goj.";
         }elseif ($bmi<39.9) {
           $procena="2 stepen goj.";
         }elseif ($bmi<39.9) {
           $procena="3 stepen goj.";
         }else{
          $procena="4 stepen goj.";
         }

         $li = $tv-100-($tv-150)*0.25;
         $pmax = 220-$broj_godina;
         $p50 = $pmax*0.5;
         $p60 = $pmax*0.6;
         $p70 = $pmax*0.7;
         $p80 = $pmax*0.8;
         $p90 = $pmax*0.9;

 $sql = "
        INSERT INTO pregled 
        (ucenici_id, telesna_visina, telesna_tezina, dtv, p, primedba ,bmi, procena, li, pmax, p50, p60, p70, p80, p90, datum_pregleda) 
        VALUES 
        ('$ucenici_id', '$tv', '$tt', '$dtv', '$pritisak', '$primedba', '$bmi', '$procena', '$li', '$pmax','$p50', '$p60', '$p70', '$p80', '$p90', NOW())";

                    if (mysqli_query($conn, $sql)) {
                        echo " Uspesno ste uneli podatke sa  pregleda  u bazu   <br>";
                         
                       // header("Location: http://localhost/januar/ucenici_izlistavanje_silazno.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }


  ?>
 
<?php require 'zatkonekcija.php'; ?>
<?php require 'bootscript.php'; ?>   
</body>
</html>
 