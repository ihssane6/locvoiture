<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
   //$dbname = "bd_locationvoiture";
    $dbname = "locationvoiture";

     $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
     if($conn->connect_error!=null){
         die("$conn->connect_error");
     }


     function queryMySql($query){
         global $conn;
         $result = $conn->query($query);
         if(!$result){
             die($conn->error);
         }

         return $result;
     }


   
   

    

?>