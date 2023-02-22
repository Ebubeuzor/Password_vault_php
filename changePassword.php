<?php

    include 'header.php';
    session_start();
    $user = array();
    require('loginreq.php');

    if (isset($_SESSION['USERID'])) {
        $user = $login->get_user_info('user','userID',$_SESSION['USERID']);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require('datbase-controller/changeProcessing.php');
            $change = new changeProcessing($db);
            $change->changePassword($_POST['oldpassword'],$_POST['newpassword'],$user['userID']);
        }
    }
?>
    <!-- register area -->
    <section id="register">
        <div id="row" class="row m-0">
            <div class="register-con">
                <div class="text-center pd-5">
                    <p class="p-1 m-0 font-ubuntu text-black-50">Change your User Name</p>
                </div>
                <div class="sub-prev-con">
                    <form method="post" enctype="multipart/form-data" id="reg-form">

                        <div class="form-row my-4">
                            <div class="col abs">
                                <input type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ""?>"  name="oldpassword" id="oldpassword" class="form-control" placeholder="Enter Old Password">
                                
                                <div class="img-con oldeyebtn">
                                    <img src="asset/eye-solid.svg"  class="oldeyes" width="100%" height="100%" />
                                </div>
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col abs">
                                <input type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ""?>"  name="newpassword" id="password" class="form-control" placeholder="Enter New Password">
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

                        <div class="submit-btn sub-prev text-center my-5">
                            <button type="submit" name="submitBTN" class="btn btn-success rounded-pill">Change</button>
                            <button type="button" id="prev-btn" class="btn prev-btn btn-warning rounded-pill">Go back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- #register area -->

    <script>
        let oldeyebtn = document.querySelector(".oldeyebtn");
        oldeyebtn.addEventListener('click',() => {
            let password = document.getElementById("oldpassword");
            let eye = document.querySelector(".oldeyes");
            if (password.type == 'password') {
                password.type = 'text';
                eye.src = 'asset/eye-slash-solid.svg';
            } else {
                password.type = 'password';
                eye.src = 'asset/eye-solid.svg';
                
            }
        })
    </script>
    
    <script src="previous.js"></script>

<?php

include 'footer.php';
?>