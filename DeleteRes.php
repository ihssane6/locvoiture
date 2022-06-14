<?php

require_once "functions.php";

if(isset($_GET['delRes'])){
    $Resid = sanitizeString($_GET['delRes']);
    queryMySql("DELETE FROM bookings WHERE id = $Resid");
    echo '<script type="text/javascript">'; 
echo 'alert("suppresion a été bien effectuée");'; 
echo 'window.location = "myReservations.php";';
echo '</script>';
        
}



?>