<?php

    require("datbase-controller/DBController.php");
    require("datbase-controller/RegisterProcessing.php");

    $db = new DBController();

    $process = new RegisterProcessing($db);


    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_pwd = $_POST['confirm_pwd'];
    $profileUpload = $_FILES['profileUpload'];

    $validatedFirstName = $process->validateString($firstName);
    $validatedLastName = $process->validateString($lastName);
    $validatedEmail = $process->validateString($email);
    $userProfile = $process->profilePic('asset/profile/',$profileUpload);

    $process->saveUserInfo($validatedFirstName,$validatedLastName,$validatedEmail,$password,$confirm_pwd,$userProfile);
?>