<?php

if (isset($_POST['PassRetrieveMail'])) {
  include "connection.php";

  $StaffID = $_POST['StaffID'];
  $email = $_POST['email'];

  $sql = "SELECT * FROM users WHERE Email='$email' AND StaffID='$StaffID'";
  $result = mysqli_query($connection, $sql) or die("Could not execute query");
  $myrow = mysqli_fetch_row($result);

  if (($StaffID == $myrow[1]) && ($email == $myrow[3])) {
    $str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
    $str = str_shuffle($str);
    $str = substr($str, 0, 6);
    $url = "localhost/LMS/resetPassword.php?token=$str&email=$email";
    $sql1 = "UPDATE users SET Token='$str' WHERE Email='$email' AND StaffID='$StaffID'";
    $result1 = mysqli_query($connection, $sql1) or die("Could not execute query");
    if ($result) {
      $to = "$email"; // Receiver Email ID, Replace with your email ID
      $subject = 'L_M_S PASSWORD RECOVERY';
      $message = "<html>
          <body>
          <h1>To reset your password, please visit this:</h1>
          <br>
          <a>$url</a>
          </body>
        </html>";
      $headers = "From: Leave Management System";

      if (mail($to, $subject, $message, $headers)) {
        echo "success";
      } else {

        echo "Failed to send mail";
      }
    }
  } else {
    echo "Invalid details";
  }
} else {
  echo "Nonsense details";
}
