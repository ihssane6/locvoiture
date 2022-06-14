<?php

require_once "header.php";

$error = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //email et mot de passe envoyés depuis le formulaire
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];
//si les champs ne sont pas remplies
    if($email == "" || $motdepasse == ""){
        $error = "Ces champs sont obligatoires";
    }else{
        //recherecher l 'existance de l'email dans la base de donnees
        $result = queryMySql("SELECT *  FROM utilisateur WHERE email = '$email'");
        if($result->num_rows == 0){
            $error = "l'email n'existe pas, réeassayer!";
        }else{
            $row = $result->fetch_assoc();
            if(!password_verify($motdepasse, $row['motdepasse'])){
                $error = "Mot de passe incorrect";
            }else{
                $_SESSION['id'] = $row['id'];
                $_SESSION['cin'] = $row['cin'];
                $_SESSION['nom'] = $row['nom'];
                 $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['numTel'] = $row['numTel'];
                $_SESSION['permis'] = $row['permis'];
                
                header("Location: cars.php");
            }
        }
    }
}

?>
<!--html login-->
<div class="content">

<form action="login.php" method="post">
<h1>Connexion</h1>
<div class="form-group">

 <div class="error"><?php echo $error; ?></div>
 <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email"  class="form-control" placeholder="votre email...">
</div>

    <div class="form-group">
    <label for="motdepasse">Mot de passe:</label>
    <input type="password" name="motdepasse" id="motdepasse" class="form-control" placeholder="votre mot de passe..." >
</div>


<input type="submit" value="Se connecter" class="btn">


</form>

</div>

</div>
</body>
<?php
require_once "footer.php";
?>
</html>
