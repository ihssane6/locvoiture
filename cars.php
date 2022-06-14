<?php

require_once "header.php";
require_once "PrivilegedUser.php";

/*if(isset($_POST['priceAsc'])){
    header("Location: home.php");
}*/


$ok=false;
if(isset($_SESSION['email'])){
    $utilisateur=PrivilegedUser::getByEmail($_SESSION['email']);
    if($utilisateur!==false && $utilisateur->hasPrivilege("Admin options"))
    {
        $ok=true;
    }
}


echo "<section class='services' id='services'>
       <div class='heading'>
            
            <h1> Notre catalogue des voitures : </h1>
            <form action='' method='GET'>
<div class='row'>
<div class='col-md-12'>
<label for='sort'>Filtrage :</label>
<select name='sort' id='sort'>
<option value=''>choisissez </option>
<option value='alphabeticalSort'>Alphabétique : A-Z</option>
<option value='priceAsc'> Par prix : faible à élevé </option>
  <option value='priceDesc'>Par prix : de haut en bas</option>
</select>
<button type='submit' class='btn btn-warning ' id='basicBtn'>
Filtrer
</button><br>

</div>
</div>
</form>
        </div class='container'>
        <div class='services-container'> ";

        $pages = 10;
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      $page = 1;
    }

    $start = ($page-1)*$pages;
        $result = queryMySql("SELECT * FROM voiture ORDER BY id DESC limit $start, $pages");
        
            if(isset($_GET['sort']) && $_GET['sort'] == 'priceAsc'){
               $result = queryMySql("SELECT * FROM voiture ORDER BY prix ASC limit $start, $pages");
            }
            else if(isset($_GET['sort']) && $_GET['sort'] == 'priceDesc'){
             $result = queryMySql("SELECT * FROM voiture ORDER BY prix DESC limit $start, $pages");
            }
            else if(isset($_GET['sort']) && $_GET['sort'] == 'alphabeticalSort'){
             $result = queryMySql("SELECT * FROM voiture ORDER BY marque ASC limit $start, $pages");
            }


while ($row = $result->fetch_assoc()){
        $voitureId = $row['id'];
        echo " <div class='box'>
                <div class='box-img'>
                   <a href='viewCar.php?view=$voitureId'> <img src='images/cars/".$row['image1']."'></a>
                </div>
                <p> ".$row['annee']."</p>
                <h3>".$row['marque']."</h3>
                <h3>".$row['nomV']."</h3>
                <h2>".$row['prix']."<span>dh/jour</span></h2>";
            if($ok){
               echo "<a href='editcar.php?id=$voitureId' class='btn btn-outline-warning'>Modifier </a>";
               echo  "<br>";
                echo "<a href='deleteCar.php?remove=$voitureId' class='btn'>Supprimer</a>"; echo "<br>";
                echo "<a href='viewCar.php?view=$voitureId' class='btn'>Voir les détails</a>";

            } 
           
          echo  "</div>" ;
                
}

echo "</div>";
echo "</div>";
echo "</section>";

/*$res = queryMySql("SELECT id FROM voiture");
$num_of_rows = mysqli_num_rows($res);
// echo $num_of_rows;
$num_of_pages = ceil($num_of_rows / $pages);
// echo $num_of_pages;


echo "
  <nav aria-label='...'>
  <ul class='pagination justify-content-center' >";

for($i = 1; $i<=$num_of_pages; $i++){
  
  
  
  echo "<li class='page-item'><a class='page-link' href='cars.php?page=".$i."'>".$i."</a></li>";
}

echo "
  </ul>
  </nav> ";*/


require_once "footer.php";
?>