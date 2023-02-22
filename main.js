$(document).ready(function () {

    let $camera = $(".camera-icon")
    let $uploadFile = $("#register .upload-profile-image input[type = 'file']")
    $uploadFile.change(function(){
        readURL(this);
        $camera.hide();
    })

    $("#reg-form").submit(function (e) { 
        let $password = $("#password");
        let $confirm = $("#confirm_pwd");
        let $error = $("#Confirm_error");
        if ($password.val() === $confirm.val()) {
            return true;
        } else {
            $error.text("Password not Match");
            e.preventDefault();
        }
    });

    $("#loginBtn").submit(function(str){
        let con_user = $("#Confirm_user");
        if (str == "") {
            con_user.text("");
        }else{
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    con_user.text(this.responseText);
                }
            }
            xhttp.open('GET','verifyuser.php?q=' + str,true);
            xhttp.send;
        }
    })

    $(".eyebtn").click(function(e){
        let password = $("#password");
        let eye = $(".eyes");
        if (password.attr('type') == 'password') {
            password.attr('type','text');
            eye.attr('src','asset/eye-slash-solid.svg');
        }else{
            password.attr('type','password');
            eye.attr('src','asset/eye-solid.svg');
        }
    });

    $(".eyebtn2").click(function(e){
        let $confirm = $("#confirm_pwd");
        let eye = $(".eyes2");
        if ($confirm.attr('type') == 'password') {
            $confirm.attr('type','text');
            eye.attr('src','asset/eye-slash-solid.svg');
        }else{
            $confirm.attr('type','password');
            eye.attr('src','asset/eye-solid.svg');
        }
    });


});


function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e){
            $("#register .upload-profile-image .img").attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}














































