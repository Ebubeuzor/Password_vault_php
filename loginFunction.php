<?php
    
    $email = $_POST['email'];
    $valaliatee = $register->validateString($email);

    $password = $_POST['password'];
    $valaliatep = $register->validateString($password);

    $inData = $login->verifyUser($valaliatee,$valaliatep);


?>