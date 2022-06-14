<?php

require_once "header.php";
echo "
<a href='index.php'><img src='images/icons/go_back.png' alt='Go back' width='50px' height='50px'></a>";
echo "<div class='container'>";

echo "<table class='table'> <tr>
         <th> E-mail de l'expéditeur  </th>
        <th> Message </th>
        <th> Date d'envoi </th>
        <th></th>
    </tr> ";
    $pages = 10;
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      $page = 1;
    }

    $start = ($page-1)*$pages;
    $result = queryMySql("SELECT * FROM contacts ORDER BY cDate DESC limit $start, $pages");



    
while($row = $result->fetch_assoc()){
  $msgId = $row['id'];
    echo "<tr>";

        echo "<td>";
            echo $row['utilisateurEmail'];
        echo "</td>";

        echo "<td>";
          echo $row['message'];
        echo "</td>";

        echo "<td>";
          echo $row['cDate'];
        echo "</td>";
  
        echo "<td>";
          echo "<a href='DeleteMsg.php?delMsg=$msgId'><img src='images/icons/korpa.jpg'
                   alt='delete' style='height='31px'; width='31px';'></a>";
        echo "</td> </tr>";
}
echo "</table>";
echo "

</div>";


// pagination
$res = queryMySql("SELECT id FROM contacts");
$num_of_rows = mysqli_num_rows($res);
// echo $num_of_rows;
$num_of_pages = ceil($num_of_rows / $pages);
// echo $num_of_pages;


echo "
  <nav aria-label='...'>
  <ul class='pagination justify-content-center' >";

for($i = 1; $i<=$num_of_pages; $i++){
  echo "<li class='page-item'><a class='page-link' href='contactList.php?page=".$i."'>".$i."</a></li>";
}

echo "</ul></nav> ";

?>

