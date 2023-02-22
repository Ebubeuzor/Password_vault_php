<?php
    
    require("datbase-controller/DBController.php");
    require("datbase-controller/LoginProcessing.php");
    require("datbase-controller/RegisterProcessing.php");
    require("datbase-controller/addSocials.php");


    $db = new DBController();
    $login = new LoginProcessing($db);
    $register = new RegisterProcessing($db);
    $getSocials = new AddSocials($db);
    
?>