<?php

    include 'header.php';
    session_start();
    $user = array();
    require('loginreq.php');

    if (isset($_SESSION['USERID'])) {
        $user = $login->get_user_info('user','userID',$_SESSION['USERID']);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require('datbase-controller/changeProcessing.php');
            $profileUpload = $_FILES['profileUpload'];
            $userProfile = $register->profilePic('asset/profile/',$profileUpload);
            $change = new changeProcessing($db);
            $change->changeProfile($userProfile,$user['userID']);
            echo "OK";
        }
    }
?>
    <!-- register area -->
    <section id="register">
        <div id="row" class="row m-0">
            <div class="register-con">
                <div class="text-center pd-5">
                    <p class="p-1 m-0 font-ubuntu text-black-50">Change your profile pic</p>
                </div>
                <div class="upload-profile-image d-flex justify-content-center pd-5">
                    <div class="text-center">
                        <div class="d-flex justify-content-center">
                            <img src="asset/camera-solid.svg" alt="camera" class="camera-icon" />
                        </div>
                        <img src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : 'asset/profile/luser.png'?> " alt="profile" class="img rounded-circle" />
                        <small class="form-text text-black-50">Choose image</small>
                        <input form="reg-form" type="file" class="form-control-file" name="profileUpload" id="upload-profile">
                    </div>
                </div>
                <div class="sub-prev-con">
                    <form method="post" enctype="multipart/form-data" id="reg-form">
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

    <script src="previous.js"></script>

<?php

include 'footer.php';
?>