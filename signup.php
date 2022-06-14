
<?php

require_once "header.php";

$error = "";
$fnameError = $lnameError = $emailError = $phoneError = $permisError = $cinError =  $adresseError = $passwordError = "";
$fname = $lname = $email =  $numTel = $permis = $cin =  $adresse = $motdepasse = "";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['fname'])){
     $fnameError = "Cette case ne peut pas etre vide";
    }else{
        $fname = ($_POST['fname']);
    }

    if(empty($_POST['lname'])){
        $lnameError= "Cette case ne peut pas etre vide";
       }else{
           $lname = ($_POST['lname']);
       }

       if(empty($_POST['email'])) {  
         $emailError = "Cette case ne peut pas etre vide";
     }
     else {
         $email = ($_POST['email']);
         if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $emailError = " email Invalide";
             $email = "";
         }
     }

    

     if(empty($_POST['numTel'])){
         $phoneError = "Cette case ne peut pas etre vide";
     }else{
         $numTel = ($_POST['numTel']);
     }

     if(empty($_POST['permis'])){
        $permisError = "Cette case ne peut pas etre vide";
    }else{
        $permis = ($_POST['permis']);
    }

     if(empty($_POST['cin'])){
        $cinError = "Cette case ne peut pas etre vide";
    }else{
        $cin = ($_POST['cin']);
    }

     if(empty($_POST['adresse'])){
        $adresseError = "Cette case ne peut pas etre vide";
    }else{
        $adresse = ($_POST['adresse']);
    }


     if(empty($_POST['motdepasse'])){
         $passwordError = "Cette case ne peut pas etre vide";
     }else{
         $motdepasse = ($_POST['motdepasse']);
     }
     
     if($fnameError == "" && $lnameError == "" && $emailError == "" && $phoneError == "" && $permisError == "" && $cinError == "" && $adresseError == "" && $passwordError == ""){
     $result = queryMySql("SELECT * FROM utilisateur WHERE email = '$email'");
      if($result->num_rows > 0){
          $emailError = "cet email est deja utilisée";
      }else{
          $cPass = PASSWORD_HASH($motdepasse, PASSWORD_DEFAULT);
          
                    $stmt = $conn->prepare("INSERT INTO utilisateur (nom, prenom, email, numTel, permis, cin, adresse,motdepasse) VALUES (?,?,?,?,?,?,?,?)");
                    $stmt->bind_param("ssssssss",$lname, $fname, $email, $numTel, $permis , $cin , $adresse,$cPass);
    
                   
                    $lname = ($_POST['lname']);
                    $fname = ($_POST['fname']);
                    $numTel = ($_POST['numTel']);
                    $email = ($_POST['email']);
                    $permis = ($_POST['permis']);
                    $cin = ($_POST['cin']);
                    $adresse = ($_POST['adresse']);
                    $motdepasse = ($_POST['motdepasse']);
                    $stmt->execute();
    
                    $stmt->close();
                      $conn->close();
                    header("Location: login.php");
      }
    }

    
}

?>


<div class="content">

    

<form action="signup.php" method="post">
<h1>Creer un nouveau compte</h1>

<span class="error">Champs Obligatoire *</span>
<div class="error"> <?php echo $error; ?> </div>
<div id="info"></div>
<div class="form-group">
     <label for="fname">Prénom: <span class="error">*<?php echo $fnameError; ?></span></label>
    <input type="text" name="fname" id="fname" class="form-control"
           placeholder="votre prenom">
   
 </div>

<div class="form-group">
<label for="lname">Nom: <span class="error">*<?php echo $lnameError; ?></span></label>
    <input type="text" name="lname" id="lname" class="form-control" placeholder="votre nom">
    
 </div>

 <div class="form-group">
 <label for="email">Email: <span class="error">*<?php echo $emailError; ?></span></label>
  <input type="email" name="email" id="email" class="form-control"
   placeholder="votre email"  onBlur="checkUser(this)">
  
 </div>



  <div class="form-group">
  <label for="numTel">Numéro Telephone: <span class="error">*<?php echo $phoneError; ?></span></label>
  <input type="text" name="numTel" id="numTel" class="form-control" placeholder="votre num de tel">
  
  </div>

  
  <div class="form-group">
  <label for="permis">Permis: <span class="error">*<?php echo $permisError; ?></span></label>
  <input type="text" name="permis" id="permis" class="form-control" placeholder="votre permis">
  
  </div>
  
  <div class="form-group">
  <label for="cin">Cin: <span class="error">*<?php echo $cinError; ?></span></label>
  <input type="text" name="cin" id="cin" class="form-control" placeholder="votre cin">
  
  </div>

  <div class="form-group">
 <label for="adresse">Adresse: <span class="error">*<?php echo $adresseError; ?></span></label>
  <input type="text" name="adresse" id="adresse" class="form-control" placeholder="votre adresse">
  
  </div>

  <div class="form-group">
  <label for="motdepasse">Mot de passe: <span class="error">*<?php echo $passwordError; ?></span></label>
  <input type="password" name="motdepasse" id="motdepasse" class="form-control" placeholder="votre mot de passe">
  
  </div>

<input type="submit" value="S'inscrire" class="btn"><br>
<a href="login.php"> vous avez deja un compte</a>

</form>

</div>

</div>

</body>


</html>
