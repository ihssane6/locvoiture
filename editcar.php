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



$msg="";
$brand = $cn = $year =  $engine = $price = $sc = $airC = $airbag = $fuel = $bv = $power = $if = $image1 = $image2 = $image3 = "";
$brandError = $cnError = $yearError =  $engineError = $priceError = $scError = $airCError =  $airbagError = $fuelError= $bvError = $powerError = $ifError = "";
if ($ok) {

    if(isset($_GET['id'])){
        $voitureId = ($_GET['id']);
        $result=queryMySql("SELECT * FROM voiture WHERE id = '$voitureId'");
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $brand = $row['marque'];
            $cn = $row['nomV'];
            $year = $row['annee'];
            $engine = $row['moteur'];
            $price = $row['prix'];
            $sc = $row['capacite'];
            $airC = $row['clim'];
            $airbag = $row['airbag'];
            $fuel = $row['carburant'];
            $bv = $row['boitevitesse'];
            $power = $row['puissance'];
            $if= $row['info'];
            $image1 = $row['image1'];
            $image2 = $row['image2'];
            $image3 = $row['image3'];
        }
    }
    

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    if(empty($_POST['brand'])){
        $brandError = "Cette case ne peut pas être laissée vide";
    } else {
        $brand = ($_POST['brand']);
    }

    if(empty($_POST['cn'])){
        $cnError = "Cette case ne peut pas être laissée vide";
    } else {
        $cn = ($_POST['cn']);
    }

    if(empty($_POST['year'])){
        $yearError = "Cette case ne peut pas être laissée vide";
    } else {
        $year = ($_POST['year']);
    }


    if(empty($_POST['engine'])){
        $engineError = "Cette case ne peut pas être laissée vide";
    } else {
        $engine = ($_POST['engine']);
    }

    if(empty($_POST['price'])){
        $priceError = "Cette case ne peut pas être laissée vide";
    } else {
        $price = ($_POST['price']);
    }

    if(empty($_POST['sc'])){
        $scError = "Cette case ne peut pas être laissée vide";
    } else {
        $sc = ($_POST['sc']);
    }



    if(empty($_POST['airC'])){
        $airCError = "Cette case ne peut pas être laissée vide";
    } else {
        $airC = ($_POST['airC']);
    }


    if(empty($_POST['airbag'])){
        $airbagError = "Cette case ne peut pas être laissée vide";
    } else {
        $airbag = ($_POST['airbag']);
    }

    if(empty($_POST['fuel'])){
        $fuelError = "Cette case ne peut pas être laissée vide";
    } else {
        $fuel = ($_POST['fuel']);
    }

    if(empty($_POST['bv'])){
        $bvError = "Cette case ne peut pas être laissée vide";
    } else {
        $bv = ($_POST['bv']);
    }

    if(empty($_POST['power'])){
        $powerError = "Cette case ne peut pas être laissée vide";
    } else {
        $power = ($_POST['power']);
    }



   

         if(isset($_POST['upload'])){
             
            if(!empty($_FILES['image1']['name'])){
            $target1 = "images/cars/".basename($_FILES['image1']['name']);
            $target2 = "images/cars/".basename($_FILES['image2']['name']);
            $target3 = "images/cars/".basename($_FILES['image3']['name']);
            $image1 = $_FILES['image1']['name'];
            $image2 = $_FILES['image2']['name'];
            $image3 = $_FILES['image3']['name'];
            
        
            if (move_uploaded_file($_FILES['image1']['tmp_name'], $target1)){
                $msg = "Image téléchargée avec succès";
            }else {
                $msg = "y a un probème au niveau de cette photo";
            }

            if (move_uploaded_file($_FILES['image2']['tmp_name'], $target2)){
                $msg = "Image téléchargée avec succès";
            }else {
                $msg = "y a un probème au niveau de cette photo";
            }

            if (move_uploaded_file($_FILES['image3']['tmp_name'], $target3)){
                $msg = "Image téléchargée avec succès";
            }else {
                $msg = "y a un probème au niveau de cette photo";
            }
            
        
         }
        }

    if($brandError == "" && $cnError == "" && $yearError == "" && $engineError == "" && $priceError == "" && $scError == "" 
        && $airCError == "" && $airbagError == "" && $fuelError == "" && $bvError == "" 
        && $powerError == "" &&  $ifError == ""){
           global $result;
            if($result->num_rows > 0){
                queryMySql("UPDATE voiture
                            SET marque = '$brand',
                                nomV = '$cn',
                                annee = '$year',
                               
                                moteur = '$engine',
                                prix = '$price',
                                capacite = '$sc',
                                clim = '$airC',
                                
                                airbag = '$airbag',
                                carburant = '$fuel',
                                boitevitesse = '$bv',
                                puissance = '$power',
                              
                                info = '$if',
                                image1 = '$image1',
                                image2 = '$image2',
                                image3 = '$image3' 
                             WHERE id = '$voitureId'");
                              header("Location: cars.php");
            }
        }
    }
}
?>

<?php if($ok) { ?>
<div class="container">
<div class="content">
    <form action="" method="post" enctype="multipart/form-data">
    <h1>Modifier </h1>
        <span class="error">Obligatoire *</span>
        <br>
        <br>
           
        
        <div class="row">
            <div class="col-md-4">
        <label for="brand">Marque: <span class="error">*<?php echo $brandError; ?></span></label>
        <input type="text" name="brand" id="brand" class="form-control" value="<?php echo $brand ?>" placeholder='Example: Audi'>
        </div>
  

    <div class="col-md-4">
    
        <label for="carName">Model: <span class="error">*<?php echo $cnError; ?></span></label>
        <input type="text" name="cn" id="cn" class="form-control" value="<?php echo $cn ?>" placeholder='Example: A3'>
    </div>
    
 

    <div class="col-md-4">
        <label for="year">Année: <span class="error">*<?php echo $yearError; ?></span></label>
        <input type="text" name="year" id="year" class="form-control" value="<?php echo $year ?>" placeholder='Example: 2015.'>
        </div>
        
</div>



    <div class="row">

    <div class="col-md-4">
        <label for="fuel">Moteur: <span class="error">*<?php echo $engineError; ?></span></label>
        <input type="text" name="engine" id="engine" class="form-control" value="<?php echo $engine ?>" placeholder='Example: 1.9 TDI'>
        
    </div>

    <div class="col-md-4">
        <label for="price">Prix/jour (dh): <span class="error">*<?php echo $priceError; ?></span></label>
        <input type="text" name="price" id="price" class="form-control" value="<?php echo $price ?>" placeholder='Example: 20'>
        
        </div>


        <div class="col-md-4">
        <label for="sc">Capacite : <span class="error">*<?php echo $scError; ?></span></label>
        <input type="text" name="sc" id="sc" class="form-control" value="<?php echo $sc ?>" placeholder='Example: 5'>
        
        </div>

   
   
    
    
</div>   

<div class="row">

<div class="col-md-4">
        <label for="airC">Climatisation :  <span class="error">*<?php echo $airCError; ?></span></label>
        <input type="text" name="airC" id="airC" class="form-control" value="<?php echo $airC ?>" placeholder='Oui/Non'>
        
        </div>

        <div class="col-md-4">
        <label for="airbag">Airbag: <span class="error">*<?php echo $airbagError; ?></span></label>
        <input type="text" name="airbag" id="airbag" class="form-control" value="<?php echo $airbag ?>" placeholder='OUI/Non'>
        
        </div>

       
<div class="col-md-4">
        <label for="fuel">Carburant: <span class="error">*<?php echo $fuelError; ?></span></label>
        <input type="text" name="fuel" id="fuel" class="form-control" value="<?php echo $fuel ?>" placeholder='Example: Diesel'>
    </div>


        

      

<div class="row">
 

       

        <div class="col-md-4">
        <label for="bv">boite vitesse :<span class="error">*<?php echo $bvError; ?></span></label>
        <input type="text" name="bv" id="bv" class="form-control" value="<?php echo $bv ?>" placeholder='Auto/Manuel'>
        </div>


<div class="col-md-4">
        <label for="power">Puissance : <span class="error">*<?php echo $powerError; ?></span></label>
        <input type="text" name="power" id="power" class="form-control" value="<?php echo $power ?>" placeholder='Example: 140hp'>
        
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
        <label for="if">Infos sur la voiture :</label>
     <textarea name="if" id="if" cols="30" rows="5" class="form-control" placeholder='plus d information' ><?php echo $if; ?></textarea>
     </div>
     </div>
     <div class="row">
     <label for="image">Images:</label>
      <div class="col-md-4">
            <input type="file" name="image1" id="image1" class="form-control">
            </div>
            <div class="col-md-4">
            <input type="file" name="image2" id="image2" class="form-control">
</div>
            <div class="col-md-4">
            <input type="file" name="image3" id="image3" class="form-control">
            </div>
</div>
            <div class="form-group">
            <input type="submit" name="upload" value="Modifier" class="btn">
        </div>
    
    </form>
    </div>
</div>
<?php 
//require_once "footer.php"; 
} else { echo "admin seulement";  }  ?>