<?php

    class LoginProcessing
    {
        private $db;

        public function __construct(DBController $db) {
            $this->db = $db;
        }

        public function verifyUser($email,$password)
        {
            if (!empty(trim($email)) && !empty(trim($password))) {
                $query = "SELECT userID,firstName,lastName,email,password,profileImage FROM user WHERE email = ?";
                $con2 = $this->db->con;
                $connect = mysqli_stmt_init($con2);
                mysqli_stmt_prepare($connect,$query);
                mysqli_stmt_bind_param($connect,"s",$email);
                mysqli_stmt_execute($connect);
                $result = mysqli_stmt_get_result($connect);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                if (password_verify($password,$row['password'])) {
                    if (!isset($_SESSION['USERID'])) {
                        session_start();
                        $_SESSION['USERID'] = $row['userID'];
                    }
                    header("Location:index.php");
                }else{
                    echo '<div style="color:red; text-align: center;">Invalid User</div>';
                }
            } else {
                echo '<div style="color:red; text-align: center;">Please fill up all the fields</div>';
            }
            
        }

        public function get_user_info($table ,$id,$userID)
        {
            
            $query = "SELECT * FROM {$table} WHERE {$id} = ?";
            $con2 = $this->db->con;
            $connect = mysqli_stmt_init($con2);
            mysqli_stmt_prepare($connect,$query);
            mysqli_stmt_bind_param($connect,"i",$userID);
            mysqli_stmt_execute($connect);
            $result = mysqli_stmt_get_result($connect);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            return empty($row) ? "" : $row;
        }

        public function logOut()
        {
            if (isset($_SESSION['USERID'])) {
                unset($_SESSION['USERID']);
                header("Location:login.php");
            }
        }

    }

?>