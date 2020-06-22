<?php

$conf = new config();

if ($conf->session()==false)  

   {  

	   echo "<script>window.location='index.php';</script>";

   }

?>





