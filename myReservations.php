<?php

require_once "header.php";


echo "<h2 style='text-align: center;'> Historique des réservations de $nm <br></h2>";
echo "<a href='cars.php'><img src='images/icons/go_back.png' alt='Go back' width='50px' height='50px'></a>";
echo "<div class='container'><br>";

echo "<table class='table'> <tr >
        
        <th> Nom de voiture </th>
        <th> De </th>
        <th>à</th>
        <th>Prix par jour </th>
        <th> Date de location </th>
        
        </tr> ";

        $pages = 10;
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }
        $start = ($page-1)*$pages;
        $result = queryMySql("SELECT utilisateur.id, voiture.marque, voiture.nomV, voiture.prix, bookings.fromDate,bookings.id, bookings.toDate,bookings.actionDate 
                      FROM bookings
                      INNER JOIN utilisateur
                      ON bookings.utilisateur_id = utilisateur.id
                      INNER JOIN voiture ON bookings.voiture_id = voiture.id 
                      WHERE utilisateur.id = $utilisateur
                      ORDER BY bookings.actionDate DESC limit $start, $pages");

   
 while($row = $result->fetch_assoc()){
        echo "<tr>";

        


         echo "<td>";
            echo $row['marque'] . ' ' .$row['nomV'];
         echo "</td>";


         echo "<td>";
             echo $row['fromDate'];
         echo "</td>";


         echo "<td>";
            echo $row['toDate'];
         echo "</td>";

         echo "<td>";
         echo $row['prix']. "DH";
         echo "</td>";

         echo "<td>";
            echo $row['actionDate'];
         echo "</td>";

         echo "<td>";
         $Resid = $row['id'];
         echo "<a href='DeleteRes.php?delRes=$Resid'><img src='images/icons/korpa.jpg'
         alt='delete' style='height='31px'; width='31px';'></a>";
         echo "</td> </tr>";
         
         
        
}
echo "</table>";

// pagination
$res = queryMySql("SELECT id FROM bookings WHERE utilisateur_id = $utilisateur;");
$num_of_rows = mysqli_num_rows($res);
// echo $num_of_rows;
$num_of_pages = ceil($num_of_rows / $pages);
// echo $num_of_pages;


echo "
  <nav aria-label='...'>
  <ul class='pagination justify-content-center' >";

for($i = 1; $i<=$num_of_pages; $i++){
  echo "<li class='page-item'><a class='page-link' href='myReservations.php?page=".$i."'>".$i."</a></li>";
}

echo "</ul></nav> ";
//require_once "footer.php";
?>
