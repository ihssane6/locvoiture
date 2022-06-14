<?php

require_once "header.php";

$error = "";
$fnameError = $lnameError = $emailError = $addressError = $phoneError = $permisError= $cinError = "";
$fname = $lname = $email = $address = $phone= $permis= $cin = "";


$result = queryMySql("SELECT * FROM utilisateur WHERE id = $utilisateur");
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $fname = $row['prenom'];
        $lname = $row['nom'];
        $email = $row['email'];
        $address = $row['adresse'];
        $phone = $row['numTel'];
        $permis = $row['permis'];
        $cin = $row['cin'];
    }

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['prenom'])){
     $fnameError = "Cette case ne peut pas être  vide";
    }else{
        $fname = ($_POST['prenom']);
    

    if(empty($_POST['nom'])){
        $lnameError= "Cette case ne peut pas être  vide";
       }else{
           $lname = ($_POST['nom']);
       }

       if(empty($_POST['email'])) {  
           
         $emailError = "Cette case ne peut pas être  vide.";
     }
     else {
         
         $email = ($_POST['email']);
         if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $emailError = " email Invalide.";
             $email = "";
         }
    }

     if(empty($_POST['adresse'])){
         $addressError = "Cette case ne peut pas être  vide";
     }else{
         $address = ($_POST['adresse']);
     }

     if(empty($_POST['numTel'])){
         $phoneError = "Cette case ne peut pas être  vide";
     }else{
         $phone = ($_POST['numTel']);
     }
     if(empty($_POST['permis'])){
        $permisError = "Cette case ne peut pas être  vide";
    }else{
        $permis = ($_POST['permis']);
    }
    if(empty($_POST['cin'])){
        $cinError = "Cette case ne peut pas être  vide";
    }else{
        $cin = ($_POST['cin']);
    }

     
     if($fnameError == "" && $lnameError == "" && $emailError == "" && $addressError == "" && $phoneError == ""&& $permisError == "" && $cinError == "" ){
        global $result;
        if($result->num_rows > 0){
            queryMySql("UPDATE utilisateur
                        SET prenom = '$fname',
                            nom = '$lname',
                            email = '$email',
                            adresse = '$address',
                           numTel = '$phone',
                           permis = '$permis',
                           cin = '$cin'
                        WHERE id = $utilisateur");
            
        }
    }
}
  
}
?>


<div class="content">

    

<form action="" method="post">
<h1>modifier profil</h1>

<span class="error">* obligatoire</span>
<div class="error"> <?php echo $error; ?> </div>

<div class="form-group">
<label for="prenom">Prenom: <span class="error">*<?php echo $fnameError; ?></span></label>
    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="votre prenom" value="<?php echo $fname; ?>">
    
 </div>


<div class="form-group">
     <label for="nom">Nom: <span class="error">*<?php echo $lnameError; ?></span></label>
    <input type="text" name="nom" id="nom" class="form-control"
           placeholder="votre nom" value="<?php echo $lname; ?>">
    
 </div>



 <div class="form-group">
 <label for="email">Email: <span class="error">*<?php echo $emailError; ?></span></label>
  <input type="email" name="email" id="email" class="form-control"
   placeholder="votre email" value="<?php echo $email; ?>">
  
 </div>

 <div class="form-group">
 <label for="adresse">Adresse: <span class="error">*<?php echo $addressError; ?></span></label>
  <input type="text" name="adresse" id="adresse" class="form-control" placeholder="votre adresse" value="<?php echo $address; ?>">
  
  </div>

  <div class="form-group">
  <label for="numTel">Num Tel: <span class="error">*<?php echo $phoneError; ?></span></label>
  <input type="text" name="numTel" id="numTel" class="form-control" placeholder="votre num Tel" value="<?php echo $phone; ?>">
  
  </div>

  <div class="form-group">
  <label for="permis">Permis: <span class="error">*<?php echo $permisError; ?></span></label>
  <input type="text" name="permis" id="numTel" class="form-control" placeholder="votre permis" value="<?php echo $permis; ?>">
  
  </div>
  <div class="form-group">
  <label for="cin">cin: <span class="error">*<?php echo $cinError; ?></span></label>
  <input type="text" name="cin" id="cin" class="form-control" placeholder="votre cin" value="<?php echo $cin; ?>">
  
  </div>

<input type="submit" value="modifier" class="btn">


</form>

</div>

</div>
<?php require_once "footer.php"; ?>
</body>
</html>