
<?php

require_once "header.php";


//il doit etre connecter avant de reserver une date
if(!$logg){
    header("Location: signup.php");
} else {
$error = "";
$fromDate = $toDate = "";
$FromError = $ToError = "";
date_default_timezone_set('Europe/Paris'); 
$Rdate_and_time = date_create()->format('Y-m-d H:i:s');
if (isset($_GET['rent'])){ 
    $voitureId = ($_GET['rent']);
}

   if($_SERVER['REQUEST_METHOD'] == 'POST'){

       if(!empty($_POST['fromDate'])){
        $fromDate = ($_POST['fromDate']);
       }  else {
           $FromError = " ne peut pas être laissée vide";
       }


       if(!empty($_POST['toDate'])){
        $toDate = ($_POST['toDate']);
       }  else {
           $ToError = " ne peut pas être laissée vide";
       }
     if ($FromError == "" || $ToError == ""){
        if($fromDate > $toDate){
        $error = "La date de début ne peut pas être supérieure à la date de fin";
    } else {
    $result = queryMySql("SELECT * FROM bookings WHERE voiture_id = $voitureId AND ((fromDate <= '$fromDate' AND toDate >= '$fromDate') OR (fromDate <= '$toDate' AND toDate >= '$toDate' ))");
        if($result->num_rows == 0){
            queryMySql("INSERT INTO bookings(voiture_id, utilisateur_id, fromDate, toDate, actionDate) 
                        VALUE ($voitureId, $utilisateur, '$fromDate', '$toDate', '$Rdate_and_time');
                        ");
                        
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Votre réservation a été bien effectuée");'; 
                        echo 'window.location = "myReservations.php";';
                        echo '</script>';
                        
            } else {
                $error = "Cette période est utilisé, essayez-en un autre";
                   } 
            
            }
                                            }
                                                }
        }



?>



    <div class="content">
    <form action="" method="Post">
        <h1>Louer Voiture</h1>
    <span class="error">Champs Obligatiore </span>
        <div class="error"><?php echo $error;  ?></div>
    <div class="form-group">
        <label for="fromDate">De:  <span class="error">*<?php echo $FromError; ?></span></label>
        <input type="date" name="fromDate" id="fromDate" class="form-control">
    </div>

    <div class="form-group">
        <label for="toDate">À:  <span class="error">*<?php echo $ToError; ?></span></label>
        <input type="date" name="toDate" id="toDate" class="form-control">
    </div>


    <div class="form-group">
        <input type="submit" value="louer" class="btn" name="create" >
    </div>
    </form>
    </div>

</body>

</html>
