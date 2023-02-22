<?php

    class Auth
    {
        public function __construct() {
            $this->isLoggedIn();
        }

        public function isLoggedIn()
        {
            if (!isset($_SESSION['USERID'])) {
                header('Location:login.php');
                return false;
            } else {
                return true;
            }
        }
    }

    $auth = new Auth();

?>