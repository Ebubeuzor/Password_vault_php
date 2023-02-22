<?php

    class changeProcessing
    {
        private $db;

        public function __construct(DBController $db) {
            $this->db = $db;
        }

        public function changeProfile($image,$userID)
        {
            $query = "UPDATE user SET profileImage = ? WHERE userID = $userID";
            $con2 = $this->db->con;
            $connect = mysqli_stmt_init($con2);
            mysqli_stmt_prepare($connect,$query);
            mysqli_stmt_bind_param($connect,"s",$image);
            mysqli_stmt_execute($connect);
            if (mysqli_stmt_affected_rows($connect) == 1) {
                header('Location:index.php');
            }
        }

        public function changeUserName($firstname,$lastname,$userID)
        {
            
            if (!empty(trim($firstname)) && !empty(trim($lastname))) {
        
                $query = "UPDATE user SET firstName = ?,lastName = ? WHERE userID = $userID";
                $con2 = $this->db->con;
                $connect = mysqli_stmt_init($con2);
                mysqli_stmt_prepare($connect,$query);
                mysqli_stmt_bind_param($connect,"ss",$firstname,$lastname);
                mysqli_stmt_execute($connect);
                if (mysqli_stmt_affected_rows($connect) == 1) {
                    header('Location:index.php');
                }
            } else {
                echo '<div style="color:red; text-align: center;">Please fill up all the fields</div>';
            }
              
        }

        public function changeEmail($email,$userID)
        {
            
            if (!empty(trim($email))) {
                $query = "UPDATE user SET email = ? WHERE userID = $userID";
                $con2 = $this->db->con;
                $connect = mysqli_stmt_init($con2);
                mysqli_stmt_prepare($connect,$query);
                mysqli_stmt_bind_param($connect,"s",$email);
                mysqli_stmt_execute($connect);
                if (mysqli_stmt_affected_rows($connect) == 1) {
                    header('Location:index.php');
                }
            } else {
                echo '<div style="color:red; text-align: center;">Please fill up all the fields</div>';
            }
            
        }

        public function changePassword($oldPassword,$newPassword,$userID)
        {
            
            if (!empty(trim($oldPassword)) && !empty(trim($newPassword))) {
                $query = "SELECT userID,firstName,lastName,email,password,profileImage FROM user WHERE userID = ?";
                $con2 = $this->db->con;
                $password_hash = password_hash($newPassword,PASSWORD_DEFAULT);
                $connect = mysqli_stmt_init($con2);
                mysqli_stmt_prepare($connect,$query);
                mysqli_stmt_bind_param($connect,"s",$userID);
                mysqli_stmt_execute($connect);
                $result = mysqli_stmt_get_result($connect);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                if (password_verify($oldPassword,$row['password'])) {
                    $query = "UPDATE user SET password = ? WHERE userID = $userID";
                    $con2 = $this->db->con;
                    $connect = mysqli_stmt_init($con2);
                    mysqli_stmt_prepare($connect,$query);
                    mysqli_stmt_bind_param($connect,"s",$password_hash);
                    mysqli_stmt_execute($connect);
                    if (mysqli_stmt_affected_rows($connect) == 1) {
                        header('Location:index.php');
                    }
                }else{
                    echo '<p style="color:red;">Invalid User</p>';
                }
            } else {
                echo '<div style="color:red; text-align: center;">Please fill up all the fields</div>';
            }
            
        }

    }

?>