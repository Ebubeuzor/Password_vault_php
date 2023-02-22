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
            $change->changeUserName($_POST['firstName'],$_POST['lastName'],$user['userID']);
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

                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo isset($user['firstName']) ? $user['firstName'] : 'Your First Name' ?>">
                            </div>

                            <div class="col">
                                <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo isset($user['lastName']) ? $user['lastName'] : 'Your Last Name' ?>">
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

    <script src="previous.js"></script>

<?php

include 'footer.php';
?>