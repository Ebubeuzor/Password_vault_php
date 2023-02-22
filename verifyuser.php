<?php

session_start();
$user = array();
require('loginreq.php');

if (isset($_SESSION['USERID'])) {
    $user = $login->get_user_info('user','userID',$_SESSION['USERID']);
}

if ($_SERVER['REQUEST_METHOD'] =='POST') {
    require ('loginFunction.php');
    $q = $_REQUEST['q'];
    $verify = "";
    if ($q !== "") {
        if ($_SESSION['USERID']) {
            if (password_verify($q,$user['password'])) {
                $verify = "";
            }
        }
    }
    echo $verify === "" ? "Incorrect Password" : $verify;
    if (isset($_SESSION['USERID'])) {
        $user = $login->get_user_info('user','userID',$_SESSION['USERID']);
    }
}


?>