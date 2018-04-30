<?php

function uverenje($today_time_stamp,$datum_isteka_time_stamp){
	     $stat = "Vazece"; 
	   

	 if ($datum_isteka_time_stamp<$today_time_stamp) {
         $stat="Nevazece";

       }
       return $stat;
}

?>