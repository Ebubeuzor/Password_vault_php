<?php

    class RegisterProcessing
    {
        private $db;

        public function __construct(DBController $db) {
            $this->db = $db;
        }

        public function validateString($input)
        {
            if (!empty($input)) {
                $trimmed = trim($input);
                $filtered = filter_var($trimmed,FILTER_SANITIZE_STRING);
                return $filtered;
            }
            return "";
        }

        public function validateEmail($input)
        {
            if (!empty($input)) {
                $trimmed = trim($input);
                $filtered = filter_var($trimmed,FILTER_SANITIZE_EMAIL);
                return $filtered;
            }
            return "";
        }

        public function profilePic($path,$image)
        {
            $targetDir = $path;
            $default = 'luser.png';
            $filename = basename($image['name']);
            $pathTargetDir = $targetDir . $filename;
            $pathinfo = pathinfo($filename,PATHINFO_EXTENSION);
            if (!empty($image)) {
                $allowedExtension = ['gif','png','jpg','jpeg', 'svg' ,'eps'];
                if (in_array($pathinfo,$allowedExtension)) {
                    if (move_uploaded_file($image['tmp_name'],$pathTargetDir)) {
                        return $pathTargetDir;
                    }
                }
            }
            return $targetDir . $default;
        }

        public function saveUserInfo($firstName,$lastName,$email,$password,$confirmPass,$profileImage)
        {
            
            
            if (!empty(trim($email)) && !empty(trim($password)) && !empty(trim($firstName)) && !empty(trim($lastName)) && !empty(trim($confirmPass))) {

                if ($password === $confirmPass) {
                    $con1 = $this->db->con;
                    $result = mysqli_query($con1,"SELECT * FROM user");
                            
                    $resultArray = [];
            
                    while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        $resultArray[] = $item;
                    }
                    
                    foreach ($resultArray as $row) {
                        if ($row['email'] != $email) {
                            $query = "INSERT INTO user (userID,firstName,lastName,email,password,profileImage,registerDate) VALUES ('',?,?,?,?,?,NOW());";
                            $password_hash = password_hash($password,PASSWORD_DEFAULT);
                            $connect = mysqli_stmt_init($con1);
                            mysqli_stmt_prepare($connect,$query);
                            mysqli_stmt_bind_param($connect,"sssss",$firstName,$lastName,$email,$password_hash,$profileImage);
                            mysqli_stmt_execute($connect);
                            if (mysqli_stmt_affected_rows($connect) == 1) {
                                session_start();
                                $_SESSION['USERID'] = mysqli_insert_id($con1);
                                header('Location:login.php');
                            }
                        }else{
                            echo '<div style="color:red; text-align: center;">Email already exists</div>';
                            break;
                        }
                    }
            
                } else {
                    echo "<span>Password Do Not Match</span>";
                }
            }else{                            
                echo '<div style="color:red; text-align: center;">All fields must be filled</div>';
            }

            


        }

    }

?>