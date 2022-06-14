<?php

require_once "header.php";

$error='';
$fp = $sp = "";
$fpError = $spError = "";

if(!$logg){

    header("Location: login.php");

} else {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['motdepasse'])){
            $fpError = 'Cette case ne peut pas être  vide';
        }else{
            $fp = ($_POST['motdepasse']);
        }
        
        if(empty($_POST['motdepasse2'])){
            $spError = 'Cette case ne peut pas être  vide';
        }else{
            $sp = ($_POST['motdepasse2']);
        }
    
        if($sp != $fp){
            $error = " entrer le meme mot de passe";
        }else{
            $codedPassword = PASSWORD_HASH($sp, PASSWORD_DEFAULT);
            queryMySql("UPDATE utilisateur
                        SET 
                        motdepasse = '$codedPassword'
                        WHERE id = '$utilisateur'
                        ");
                        header("Location: login.php");
        }
     } 

}
?>

<div class="container">
<div class="content">

<form action="" method="post">
    <h1>Changer mot de passe</h1>
    <div class="error"><?php echo $error; ?></div>
    <span class="error">* obligatoires</span>
    <br>
    <label for="pass">Nouveau mot de passe:<span class="error"> *<?php echo $fpError;  ?></span></label>
    <input type="password" name="motdepasse" id="motdepasse" class='form-control'>
    

    <label for="pass2">Confirmer  mot de passe:<span class="error"> *<?php echo $spError;  ?></span></label>
    <input type="password" name="motdepasse2" id="motdepasse2" class='form-control'>
    

    <input type="submit" value="Changer" class='btn'>
</form>

</div>
</div>

<?php require_once 'footer.php' ?>
