<?php

require_once "functions.php";

if(isset($_POST['email'])){
    $email = ($_POST['email']);
    $result = queryMySql("SELECT * FROM utilisateur WHERE email = '$email'");
    if($result->num_rows){
        echo "<span class='taken'>l'email est déja utilisée</span>";
    } else {
        echo "<span class='available'> email disponible</span>";
    }
}



?>