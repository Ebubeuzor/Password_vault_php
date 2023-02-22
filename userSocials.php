<?php
    session_start();
    include("header.php");
    if (isset($_SESSION['USERID'])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submitBTN'])) {
                require('datbase-controller/addSocials.php');
                require('datbase-controller/DBController.php');
                $db = new DBController();
                $addSocials = new addSocials($db);
                $addSocials->saveSocialsInfo($addSocials->validateString($_POST['socialName']),$addSocials->validateString($_POST['password']),$addSocials->validateString($_POST['confirm_pwd']),$addSocials->validateString($_POST['userName']),$_SESSION['USERID']);
            }
        }
    }else{
        echo "No";
    }


?>


<!-- register area -->
    <section id="register" class="login-con">
        <div id="row" class="row m-0">
            <div class="register-con ">
                <div class="text-center pd-5">
                    <h4 class="login-title text-dark" >Enter your details below</h4>
                </div>
                <div class="login-form">
                    <form method="post" id="reg-form" enctype="multipart/form-data">
                    
                        <div class="form-row my-4">
                            <div class="col">
                                <input type="text" required value="<?php echo isset($_POST['socialName']) ? $_POST['socialName'] : ""?>"  name="socialName" id="socialName" class="form-control" placeholder="Social Name">
                            </div>
                        </div>
                    
                        <div class="form-row my-4">
                            <div class="col">
                                <input type="text" required value="<?php echo isset($_POST['userName']) ? $_POST['userName'] : ""?>"  name="userName" id="userName" class="form-control" placeholder="UserName">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col abs">
                                <input type="password" required value="<?php echo isset($_POST['password']) ? $_POST['password'] : ""?>"  name="password" id="password" class="form-control" placeholder="Password">
                                <small id="Confirm_error"></small>

                                <div class="img-con eyebtn">
                                    <img src="asset/eye-solid.svg"  class="eyes" width="100%" height="100%" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row my-4">
                            <div class="col abs">
                                <input type="password" value="<?php echo isset($_POST['confirm_pwd']) ? $_POST['confirm_pwd'] : ""?>"  name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password">
                                
                                <div class="img-con eyebtn2">
                                    <img src="asset/eye-solid.svg" class="eyes2" width="100%" height="100%" />
                                </div>
                            </div>
                        </div>

                        <div class="passgen">
                            <a href="generatedPassword.php">Would you like to use our password generator so you don't have to think of a password</a>
                        </div>

                        <div class="submit-btn text-center my-5">
                            <button type="submit" name="submitBTN" class="btn btn-warning rounded-pill text-dark px-5">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- #register area -->






<?php

    include("footer.php")

?>