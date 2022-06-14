<?php

require_once "header.php";
require_once "PrivilegedUser.php";




$ok=false;

if(isset($_SESSION['email'])){
    $utilisateur=PrivilegedUser::getByEmail($_SESSION['email']);
    if($utilisateur!==false && $utilisateur->hasPrivilege("Admin options"))
    {
        $ok=true;
    }
}

if($ok){
if (isset($_GET['remove'])){
    $voitureId = $_GET['remove'];
    queryMySql(" DELETE FROM voiture WHERE id = $voitureId ");

    echo '<script type="text/javascript">'; 
echo 'alert("suppresion a été bien effectuée");'; 
echo 'window.location = "cars.php";';
echo '</script>';
}


} else {
    echo "cette page est pour l'admin seulement";
}
?>