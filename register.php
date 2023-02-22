<?php

include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submitBTN'])) {
        require('function.php');
    }
}
?>
    <!-- register area -->
    <section id="register">
        <div id="row" class="row m-0">
            <div class="register-con">
                <div class="text-center pd-5">
                    <h1 class="login-title text-dark" >Registeration</h1>
                    <p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy additional features</p>
                    <span class="p-1 m-0 font-ubuntu text-black-50">I already have <a href="login.php">Login</a> </span>
                </div>
                <div class="upload-profile-image d-flex justify-content-center pd-5">
                    <div class="text-center">
                        <div class="d-flex justify-content-center">
                            <img src="asset/camera-solid.svg" alt="camera" class="camera-icon" />
                        </div>
                        <img src="asset/luser.png" alt="profile" class="img rounded-circle" />
                        <small class="form-text text-black-50">Choose image</small>
                        <input form="reg-form" type="file" class="form-control-file" name="profileUpload" id="upload-profile">
                    </div>
                </div>
                <div class="d-flex justify-context-center">
                    <form method="post" enctype="multipart/form-data" id="reg-form">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" value="<?php echo isset($_POST['firstName']) ? $_POST['firstName'] : ""?>"  name="firstName" id="firstName" class="form-control" placeholder="First Name">
                            </div>

                            <div class="col">
                                <input type="text" value="<?php echo isset($_POST['lastName']) ? $_POST['lastName'] : ""?>"  name="lastName" id="lastName" class="form-control" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""?>"  name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col abs">
                                <input type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ""?>"  name="password" id="password" class="form-control" placeholder="Password">
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

                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="agreement" class="form-check-input" required />
                            <label for="agreement" class="form-check-label font-ubuntuvtext-black-50">I agree <a href="#">terms, conditions and policy</a> (*)</label>
                        </div>

                        <div class="submit-btn text-center my-5">
                            <button type="submit" name="submitBTN" class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
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