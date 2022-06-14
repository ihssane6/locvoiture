<?php
session_start();
require_once "functions.php";
require_once "PrivilegedUser.php";




$ok=false;

if(isset($_SESSION['email'])){
    $utilisateur=PrivilegedUser::getByEmail($_SESSION['email']);
    if($utilisateur!==false && $utilisateur->hasPrivilege("Admin options"))
    {
        $ok=true;
    }
}


$logg = false;
if(isset($_SESSION['id'])){
    $logg = true;
    $utilisateur = $_SESSION['id'];
    $nm = $_SESSION['nom'];
    $eml = $_SESSION['email'];
     $phne = $_SESSION['numTel'];
}


?>

<!DOCTYPE >
<html >
<head>

    <link rel="stylesheet" href="css/style.css">
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    
    <title>Luxe Location </title>
</head>
<body>

        <div class="pre-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                   <p><a href="index.php" id="home-button" font-family >LUXE LOCATION</a></p>
                    </div>

                    <div class="col-md-7">
                <ul class="secondary-menu">
                    <li><a href="index.php">accueil</a></li>
                    <li><a href="#aboutus"> A propos </a></li>
                 <!--  <li><a href="#contact">Contact</a></li>-->
                    <li><a href="cars.php">Liste Voiture</a></li>
                  <?php if($logg) { ?>
                    
                    <?php if($ok){ ?>
                   <div class="dropdown">
                       <a href="">Admin options</a>
                        <i class="fa fa-caret-down"></i>
                           <div class="dropdown-content">
                              <a href="addcar.php">Ajouter voiture</a>
                              <a href="cars.php">Modifier/supprimer voiture</a>
                              <a href="rentedList.php">Liste des voitures louées</a>
                              <a href="contactList.php">Messages</a>
                              
                           </div>
                    </div> 
                    <?php } ?>
                   
                    <div class="dropdown">
                       <a href="">Profile</a>
                        <i class="fa fa-caret-down"></i>
                           <div class="dropdown-content">
                               
                           <?php if(!$ok){ ?>
                           <a href="myReservations.php">Mes Réservations</a> 
                           <?php } ?>

                           <a href="editProfile.php">Modifier Mon compte</a>
                           <a href="changePassword.php">Changer Mot de passe</a>

                           

                           </div>
                    </div> 
                   
                    <li><a href="logout.php">Déconnection</a></li>
                  
                <?php } else { ?>

                    
                    <div class="dropdown">
                       <a href="">Inscription</a>
                        <i class="fa fa-caret-down"></i>
                           <div class="dropdown-content">
                              <a href="signup.php">S'inscrire</a>
                              <a href="login.php">Connexion</a>
                              
                           </div>
                    </div> 

                <?php } ?>
                
                 </ul>  
                    </div>
                </div>
            </div>
        </div>

    
