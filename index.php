<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:\LMS\\" . $_SESSION['role'] . "\dashboard.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="author" content="Abdul_Azeez">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE;" />
    <title>L_M_S | LOGIN</title>
    <link rel="stylesheet" type="text/css" href="/LMS/style/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/LMS/style/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("PasswordInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>

<body>
    <section>
        <div id="wrapper" class="col-lg-3">

            <!-- <p id="loading_spinner"><img src="/FYP/images/loader.gif"></p> -->
            <div id="loading_spinner" class="clear-loading spinner">
                <span></span>
            </div>
            <form method="post" class="form" action="do_login.php" onsubmit="return do_login();">
                <div class="box">
                    <div class="inputBox">

                        <input type="text" id="username" name="username" required>
                        <label><i class="fa fa-user" aria-hidden="true"></i>Username <font color='orange'> *</font>
                        </label>

                    </div>
                    <div class="inputBox">

                        <input type="password" name="password" id="PasswordInput" title="A password of lenght 6" required>
                        <label><i class="fa fa-unlock-alt" aria-hidden="true"></i>Password <font color='orange'> *
                            </font>
                        </label>
                        <div class="showPassword">
                            <input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
                            <span class="check" for="check3">Show password</span>

                        </div>

                    </div>
                    <input type="submit" name="submit" value="Login">
                </div>
            </form>
            <div style="position: absolute; bottom:5%; align-self: center;">
                <a class="forgotPass" href="RetrievePassword.php">Forgot Password?</a>
            </div>

        </div>
        <div class="imgSide col-md-9">

        </div>
    </section>
</body>
<script type="text/javascript">
    function do_login() {
        var email = $("#username").val();
        var pass = $("#PasswordInput").val();
        if (email != "" && pass != "") {
            $("#loading_spinner").css({
                "opacity": "1"
            });
            $.ajax({
                type: 'post',
                url: '/LMS/do_login.php',
                data: {
                    do_login: "do_login",
                    username: email,
                    password: pass
                },
                success: function(response) {
                    if ((response == "Staff") || (response == "Admin") || (response == "Superior")) {
                        setTimeout(function() {
                            window.location.href = "/LMS/" + response + "/dashboard.php";
                        }, 1000)
                    } else {
                        $("#loading_spinner").css({
                            "opacity": "0"
                        });
                        alert(response);
                    }
                }
            });
        } else {
            alert("Please Fill All The Details");
        }

        return false;
    }
</script>

</html>