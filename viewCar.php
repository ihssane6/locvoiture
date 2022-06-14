<?php

ini_set('desplay_errors',1);
ini_set('display_startup_errors',1); 
error_reporting(E_ALL);

require_once "header.php";
if(isset($_GET['view'])){
    $voitureId = ($_GET['view']);
   
}

$result = queryMySql("SELECT * FROM voiture WHERE id = $voitureId");
if($result->num_rows > 0){
    $row = $result->fetch_assoc();

echo "<div class='container'>
  <div class='row'>
            <div class='col-md-12'>";
            echo "<h1>".$row['marque'] . ' ' . $row['nomV']; "</h1>";
            echo "</div>";
echo "</div>";

        echo "<div class='row'>
            <div class='col-md-4'>";
            
            echo "<img src='images/cars/".$row['image1']."' width='400px', height='300px'>";  
echo "</div>";

           echo "<div class='col-md-4'>";
            echo "<img src='images/cars/".$row['image2']."' width='400px', height='300px'>";  
echo "</div>";

echo "<div class='col-md-4'>";
echo "<img src='images/cars/".$row['image3']."' width='400px', height='300px'>";  
echo "</div>";
echo "</div>";

echo "<div class='row'>
            <div class='col-md-4 text2'>";
                
            echo "Année: ".$row['annee'];
            echo "<br>Carburant: ".$row['carburant'];
            echo "<br>Moteur: ".$row['moteur'];
            echo "<br>Puissance: ".$row['puissance'];
            echo "<br><u>Prix/jour:</u> ".$row['prix']. "DH";
            echo "</div>
            <div class='col-md-4 text2'>";
            echo "Climatisation: ".$row['clim'];
            echo "<br>Airbag: ".$row['airbag'];
            echo "<br>Capacite: ".$row['capacite'];
            echo "</div>
            <div class='col-md-4 text2'>";
            echo "Info:<br> ".$row['info'];
echo "</div></div>";
echo "<br>";

echo "<div class='row'>
            <div class='col-md-12'>";
            echo "<a href='renting.php?rent=$voitureId' class='btn btn-outline-warning'>louer maintenant</a>";

echo "</div></div></div>";

require_once "footer.php";
}

?>