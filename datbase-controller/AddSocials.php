<?php

    class AddSocials
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

        public function saveSocialsInfo($social_media,$password,$confirmPass,$username,$userID)
        {
            
            if (!empty(trim($social_media)) && !empty(trim($password)) && !empty(trim($confirmPass))) {
                    
                if ($password === $confirmPass) {
                    $query = "INSERT INTO user_social (social_media,password,user_name,userID) VALUES (?,?,?,?);";
                    $ciphering = "AES-128-CTR";
                    $options = 0;
                    $encryption_iv = "1234567891011121";
                    $encryption_key = "W3docs";
                    $encryption = openssl_encrypt($password,$ciphering,$encryption_key,$options,$encryption_iv);
                    $con1 = $this->db->con;
                    $connect = mysqli_stmt_init($con1);
                    mysqli_stmt_prepare($connect,$query);
                    mysqli_stmt_bind_param($connect,"sssi",$social_media,$encryption,$username,$userID);
                    mysqli_stmt_execute($connect);
                    if (mysqli_stmt_affected_rows($connect) == 1) {
                        header('Location:index.php');
                    }
                } else {
                    echo "<span>Password Do Not Match</span>";
                }

            }else {
                echo '<div style="color:red; text-align: center;">Please fill up all the fields</div>';
            }
            
        }

        public function getData($userID)
        {
            $query = "SELECT * FROM user_social WHERE userID = $userID;";
            $result = $this->db->con->query($query);
            $getResult = array();

            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $getResult[] = $item;
            }

            return $getResult;
        }

        public function deleteData(int $id)
        {
            $query = "DELETE FROM user_social where id = {$id}";
            $result = $this->db->con->query($query);

            if ($result) {
                header("Location:". $_SERVER['PHP_SELF']);
            }

            return $result;
        }
    }


?>