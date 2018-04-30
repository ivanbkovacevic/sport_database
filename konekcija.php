<?php
$servername = "localhost";
$username = "ivan1";
$password = "asdfg";
$db_name = "zadatak";


// Create connection
 $conn = new mysqli("$servername", "$username", "$password", "$db_name");
  

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
    echo "KONTEKTOVALO SE SA BAZOM <br>";
    
    date_default_timezone_set('Europe/Belgrade');
    mysqli_set_charset($conn,"utf8");

/*
    =========================================================*/

    function delete_record($conn, $table_name, $id){
    	$sql="DELETE FROM {$table_name} WHERE id={$id}";
    	$result = $conn->query($sql);

		if (mysqli_query($conn, $sql)) {
		    return "Uspesno ste obrisali red iz tabele {$table_name}";
		} else {
		    return "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

    }


    function selectAllFromTable($conn,$table){
        
            $sql = "SELECT * FROM ".$table;
            $result = $conn->query($sql);
                if (!mysqli_query($conn, $sql)) {
                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }                
                return $result;                      
    }

     function selectAllFromTableZaPregled($conn,$id){
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
                      klub.ime as ime_kluba
                    FROM ucenici
                      INNER JOIN skole ON skole.id=ucenici.skola_id 
                      INNER JOIN klub ON klub.id=ucenici.klub_id
                    
                    WHERE ucenici.id = {$id} ";

            $result = $conn->query($sql);
                if (!mysqli_query($conn, $sql)) {
                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }                
                return $result; 
                                   
    }

   function insertIntoTable($conn, $table, $id, $tv, $tt){

        $sql1 = "
        INSERT INTO $table 
        (ucenici_id, telesna_visina, telesna_tezina,datum) 
        VALUES 
        ('$id', '$tv', '$tt', NOW())";

                    if (mysqli_query($conn, $sql1)) {
                        echo " Uspesno ste uneli podatke u bazu u tabelu $table <br>";
                    } else {
                        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                    }
    }




    ?>