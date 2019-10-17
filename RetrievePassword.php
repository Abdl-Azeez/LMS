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
  <title>L_M_S | Password Recovery</title>
  <link rel="stylesheet" type="text/css" href="/LMS/style/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/LMS/style/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
  <section>
    <div id="wrapper" class="col-lg-3">

      <!-- <p id="loading_spinner"><img src="/FYP/images/loader.gif"></p> -->
      <div id="loading_spinner" class="clear-loading spinner">
        <span></span>
      </div>
      <form method="post" class="form" action="PassRetrieveMail.php" onsubmit="return PassRetrieveMail();">
        <div class="box">
          <div class="inputBox">
            <input type="email" name="email" id="email" required>
            <label><i class="fa fa-envelope-o" aria-hidden="true"></i>Email <font color='red'> *</font></label>

          </div>
          <div class="inputBox">
            <input type="ID" name="StaffID" id="StaffID" required>
            <label><i class="fa fa-user-o" aria-hidden="true"></i>Staff ID <font color='red'> *</font></label>

          </div>
          <input type="submit" name="submit" value="Send">
        </div>
      </form>

      <div style="position: absolute; bottom:5%; align-self: center;">
        <a class="forgotPass" href="index.php">Back to Login</a>
      </div>

    </div>
    <div class="imgSide col-md-9">

    </div>
  </section>
</body>
<script type="text/javascript">
  function PassRetrieveMail() {
    var email = $("#email").val();
    var StaffID = $("#StaffID").val();
    if (email != "" && StaffID != "") {
      $("#loading_spinner").css({
        "opacity": "1"
      });
      $.ajax({
        type: 'post',
        url: '/LMS/PassRetrieveMail.php',
        data: {
          PassRetrieveMail: "PassRetrieveMail",
          email: email,
          StaffID: StaffID
        },
        success: function(response) {
          if (response == "success") {
            alert("Mail sent succesfully. \n Kindly Check your mail")
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