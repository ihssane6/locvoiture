<?php

require_once "functions.php";


$EmailError = $msgError = "";
date_default_timezone_set('Europe/Paris'); 
$date_and_time = date_create()->format('Y-m-d H:i:s');
// if($_SERVER['REQUEST_METHOD'] == 'POST')
if(isset($_POST['ContactButton'])){
    if(empty($_POST['UtilisateurEmail'])) {  
        $EmailError = "Cette case ne peut pas être  vide.";
    }
    else {
        $UtilisateurEmail = ($_POST['UtilisateurEmail']);
        if(!filter_var($UtilisateurEmail, FILTER_VALIDATE_EMAIL)) {
            $EmailError = "Format d'email est invalide. ";
            $UtilisateurEmail= "";
        }
    }

    if(empty($_POST['msg'])){
        $msgError = "Cette case ne peut pas être  vide.";
    } else {
    $msg = ($_POST['msg']);        
        $msg = preg_replace('/\s\s+/', ' ', $msg);
    }

    if($EmailError == "" && $msgError == ""){
        $stmt = $conn->prepare("INSERT INTO contacts (UtilisateurEmail, message , cDate) VALUES (?,?,'$date_and_time')");
                $stmt->bind_param("ss",$UtilisateurEmail,$msg);

                $UtilisateurEmail=$_POST['UtilisateurEmail'];
                $msg=$_POST['msg'];
                $stmt->execute();

                $stmt->close();
                  $conn->close();
    }

}


?>
    <footer>
    
    <div class="main-content">
        <div class="left box">
        
            <h2 id="aboutus">A propos de nous</h2>
            <div class="content3">
            <p>Luxe Location est la plus grande société de location de voitures du pays, qui loue des voitures de luxe.
              Si vous voyagez pour affaires ou pour le plaisir et que vous avez besoin d'une voiture pour vos vacances ou pour un trajet
              à un emplacement exclusif Luxe Location  est là pour répondre à tous vos besoins. </p>
              <div class="social">
                  <a href="#" target="_blank"><span class=" fab fa-facebook-f"></span></a>
                  <a href="#" target="_blank"><span class=" fab fa-twitter"></span></a>
                  <a href="#" target="_blank"><span class=" fab fa-instagram"></span></a>
                  <a href="#" target="_blank"><span class=" fab fa-youtube"></span></a>
              </div>
              <p class="copyright">Copyright © 2022 by <a href="#" style="text-decoration: none; color: red;" target="_blank">IHSSANE AIT IDIR / AYOUB LAMFADLI</a></p>
        </div>
    </div>
    
    <div class="center box">
      <h2>Adresse</h2>
      <div class="content3">
          <div class="place">
              <span class="fas fa-map-maker-alt"></span>
              <span class="text">Agadir , MAROC </span>
          </div>

          <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text">+2127777777777</span>
          </div>

          <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text"><a >contact.luxelocation@gmail.com</a></span>
          </div>
      </div>
    </div>


    <div class="right box">
        <h2 id="contact">contactez nous</h2>
        <div class="content3">
            <form action="" method="POST">
                
                <div class="email">
                    <div class="text">Email </div>
                    <input type="email" name="UtilisateurEmail" id="UtilisateurEmail" required>
                    <span class="error"><?php echo $EmailError; ?></span>
                </div>

                <div class="msg">
                    <div class="text">Message </div>
                    <textarea cols="23" rows="2" name="msg" id="msg" required></textarea>
                    <span class="error"><?php echo $msgError; ?></span>
                </div>

                <div class="contact-btn">
                    <input type="submit" value="Send" name="ContactButton">
                </div>
            </form>
        </div>
    </div>


    </div>
    </footer>