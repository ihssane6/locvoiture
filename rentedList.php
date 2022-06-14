<?php   

require_once "header.php";
require_once "PrivilegedUser.php";




$ok=false;

if(isset($_SESSION['email'])){
    $utilisateur=PrivilegedUser::getByEmail($_SESSION['email']);
    if($utilisateur!==false && $utilisateur->hasPrivilege("Admin options"))
    {
        $ok=true;
    }
}

if($ok){
  echo "<a href='index.php'><img src='images/icons/go_back.png' alt='Go back' width='50px' height='50px'></a>";
echo "<div class='container'><br>";

echo "<table class='table'> <tr >
         <th> Nom du client </th>
        <th> Nom de voiture </th>
        <th> de </th>
        <th> a  </th>
        <th>Prix par jour </th>
        <th> Jour de reservation </th>
        
        </tr> ";

        $pages = 10;
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }
    
        $start = ($page-1)*$pages;
        $result = queryMySql("SELECT utilisateur.prenom, utilisateur.nom, voiture.marque, voiture.nomV, voiture.prix, bookings.fromDate, bookings.toDate,bookings.actionDate 
                      FROM bookings
                      INNER JOIN utilisateur
                      ON bookings.utilisateur_id = utilisateur.id
                      INNER JOIN voiture ON bookings.voiture_id = voiture.id ORDER BY bookings.actionDate DESC limit $start, $pages");

    while($row = $result->fetch_assoc()){
        echo "<tr>";

        echo "<td>";
            echo $row['prenom'] . ' '.$row['nom'] ;
        echo "</td>";


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
         echo "</td> </tr>";

         
         
         
        
}
echo "</table>

</div>";

$res = queryMySql("SELECT id FROM bookings");
$num_of_rows = mysqli_num_rows($res);

$num_of_pages = ceil($num_of_rows / $pages);


echo "
  <nav aria-label='...'>
  <ul class='pagination justify-content-center' >";

for($i = 1; $i<=$num_of_pages; $i++){
  
  
  
  echo "<li class='page-item'><a class='page-link' href='rentedList.php?page=".$i."'>".$i."</a></li>";
}

echo "
  </ul>
  </nav> ";

} else {
    echo "Cette page est uniquement pour l'utilisateur administrateur";
}
?>
