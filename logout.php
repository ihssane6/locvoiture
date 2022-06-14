<?php
require_once "header.php";

    if(isset($_SESSION['id']))
    {

        $_SESSION = array();
        session_destroy();  
        header("Location: index.php");
    } 


?>

</div>
</body>

</html>