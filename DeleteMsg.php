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
if (isset($_GET['delMsg'])){
    $msgId = ($_GET['delMsg']);
    queryMySql("DELETE FROM contacts WHERE id = $msgId");

    echo '<script type="text/javascript">'; 
echo 'alert("suppresion a été bien effectuée");'; 
echo 'window.location = "contactList.php";';
echo '</script>';
}
} else {
    echo "Cette page est uniquement pour l'utilisateur admin";
}
?>