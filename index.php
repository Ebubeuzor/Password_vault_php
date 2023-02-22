<?php
    session_start();
    include("main-header.php");
    
    $user = array();
    require('loginreq.php');
    
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        if (isset($_POST['deleteValue'])) {
            $user = $login->get_user_info('user_social','userID',$_SESSION['USERID']);
            $getSocials->deleteData($user['id']);
        }

        if (isset($_POST['logout'])) {
            $login->logOut();
        }
    }

    if (isset($_SESSION['USERID'])) {
        $user = $login->get_user_info('user','userID',$_SESSION['USERID']);
        
    }else{
        echo 'hello';
    }

?>

    <div class="index-header">
        <div class="web-name">Ebube Password Valut</div>
        
        <div class="log-out">
            <form method="post">
                <input type="submit" class="logout" value="Logout" name="logout">
            </form>
        </div>
    </div>

    <div class="container">

        <div class="userDetailContainer">
            
            <div class="userdetailContainer1">
                <div class="profilePicCon">
                    <img src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : 'asset/profile/luser.png'?> " alt="profile" class="img rounded-circle" />
                </div>

    
                <div class="userdetailContainer2">
                    <ul>
                        <li class="username"><span><?php echo isset($user['firstName']) ? $user['firstName'] . ' ' . $user['lastName']: 'UserName'?></span></li>
                        <li class="email"><span><?php echo isset($user['email']) ? $user['email'] : 'email'?></span></li>
                    </ul>
                </div>
            </div>
            
            <div class="userdetails">
                <ul>
                    <li><a href="<?php printf("%s?%s","changeProfilePic.php","profilePic") ?>">Change your profile picture</a></li>
                    <li><a href="changeName.php">Change your user name</a></li>
                    <li><a href="changeEmail.php">Change your email</a></li>
                    <li><a href="changePassword.php">Change your password</a></li>
                </ul>
            </div>
        </div>

        <div class="userSocials">        
    
            <div class="gurantee">
                Rest assure that your passwords are being encryted so that only you can view it
            </div>

            <div class="userSocialsHeader">
                <div class="userSocialsHeader1">Your Socials Username and Password</div>
                <div class="userSocialsHeader2"><a href="userSocials.php">+ ADD DATA</a></div>
            </div>

            <div class="userSocialInfo">
                <table>
                    
                    <thead>
                        <td>Social Name</td>
                        <td>UserName</td>
                        <td>Password</td>
                    </thead>

                    <?php foreach($getSocials->getData($_SESSION['USERID']) as $userDetails){ ?>

                    <tbody>
                        <td><?php echo $userDetails['social_media'] ?? "socialMdeia" ?></td>
                        <td><?php echo $userDetails['user_name'] ?? "User Name" ?></td>
                        <td><?php 
                                $ciphering = "AES-128-CTR";
                                $iv_length = openssl_cipher_iv_length($ciphering);
                                $options = 0;
                                $decryption_iv = "1234567891011121";
                                $decryption_key = "W3docs";
                                $decryption = openssl_decrypt($userDetails['password'],$ciphering,$decryption_key,$options,$decryption_iv);
                                echo $decryption ?? "User Password" 
                            ?></td>
                        <td>
                            <form method="post">
                                <input class="del" type="submit" name="deleteValue" value="delete">
                            </form>
                        </ltd>
                    </tbody>

                    <?php }?>
                </table>
            </div>
        </div>
    </div>


<?php

    include("footer.php")

?>