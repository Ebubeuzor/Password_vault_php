<?php
    include 'header.php';
?>

<?php
    session_start();
    $user = array();
    require('loginreq.php');

    if (isset($_SESSION['USERID'])) {
        $user = $login->get_user_info('user','userID',$_SESSION['USERID']);
    }
    
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        require ('loginFunction.php');
        if (isset($_SESSION['USERID'])) {
            $user = $login->get_user_info('user','userID',$_SESSION['USERID']);
        }
    }


?>
    
    <!-- register area -->
    <section id="register" class="login-con">
        <div id="row" class="row m-0">
            <div class="register-con ">
                <div class="text-center pd-5">
                    <h1 class="login-title text-dark" >Login</h1>
                    <p class="p-1 m-0 font-ubuntu text-black-50">Login and enjoy additional features</p>
                    <span class="p-1 m-0 font-ubuntu text-black-50">Create a new <a href="register.php">Account</a> </span>
                </div>
                <div class="upload-profile-image d-flex justify-content-center pd-5">
                    <div class="text-center">
                        <img src="<?php echo $user['profileImage'] ?? 'asset/profile/luser.png'?> " alt="profile" class="img rounded-circle" />
                    </div>
                </div>
                <div class="login-form">
                    <form method="post" action="login.php" enctype="multipart/form-data">
                    
                        <div class="form-row my-4">
                            <div class="col">
                                <input type="email" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""?>"  name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col abs">
                                <input type="password" required value="<?php echo isset($_POST['password']) ? $_POST['password'] : ""?>"  name="password" id="password" class="form-control" placeholder="Password">
                                <small id="Confirm_user"></small>

                                <div class="img-con eyebtn">
                                    <img src="asset/eye-solid.svg"  class="eyes" width="100%" height="100%" />
                                </div>
                            </div>
                        </div>

                        <div class="submit-btn text-center my-5">
                            <button type="submit" name="submitBTN" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- #register area -->


<?php
    include 'footer.php';
?>