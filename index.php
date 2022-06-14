<?php 
 
 
require_once "header.php";
 
?>


<!DOCTYPE >
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>


 <body onload="slider()">
 <main id="main">
<div class="banner">
    <div class="slider">
        <img src="images/index/sl2.jpg" alt="" id="slideImg">
    </div>
    <div class="overlay">
    <div class="content2">
        <h1>Les meilleurs voitures de pays</h1>
        <h3>Si vous souhaitez conduire des voitures de luxe  au meilleur prix, vous êtes au bon endroit !</h3>
        
        <div>
            <a href="cars.php" class="btn btn-outline-warning"> Voir nos voitures </a>
           
        </div>
    </div>
    </div>
</div>
</main>

<?php
    require_once "footer.php"
?>
<script src="js/index.js"></script>

</body>
</html>