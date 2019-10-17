<!DOCTYPE html>
<html>

<head>
  <title>L M S | Dashboard</title>
  <link rel="icon" href="\LMS\images\DKicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">
  <link href="/LMS/style/dashboard.css" rel="stylesheet" type="text/css">
</head>


<body>
  <nav>
    <!-- <span id="open" style="display:none;" class="toggle" onclick="openNav()">&rarr;</span> -->
    <i id="open" style="display:none; top:17px;" class="toggle material-icons" onclick="openNav()">arrow_forward</i>
    <a href="javascript:void(0)" id="close" class="toggle" onclick="closeNav()">&#9776;</a>

  </nav>
  <aside id="mySidenav" class="sidenav">
    <div class="sidebar-profile">
      <div class="sidebar-profile-image">
        <img src="/LMS/images/userPlaceholder.png" alt="">
      </div>
      <div class="sidebar-profile-info">
        <p style="margin:0;">Hashim Maru</p>
        <b style="margin-left: 25px;">Issuer</b>
      </div>
    </div>
    <ul>
      <li><a href="#"><i class="material-icons">view_column</i>Records</a></li>
      <li><a href="#"><i class="material-icons">dvr</i>Issue Payslips</a></li>
      <li><a href="#"><i class="material-icons">account_circle</i>Profile</a></li>
      <li><a href="/LMS/logout.php"><i class="material-icons">exit_to_app</i>Logout</a></li>
    </ul>
    <div class="footer">
      <a href="https://www.capitaldk.com/">
        <img src="/LMS/images/logo.jpg" alt="" style="height:50px; width:80px;">
        <p><span style="color:black;">&copy;</span><span style="color:#969595;">CAPITAL</span> DK</p>
      </a>
    </div>
  </aside>

  <div id="main">
    <h2>BODY SUBJECT</h2>
    <p>Body content</p>
  </div>

  <script>
    function openNav() {
      document.getElementById("mySidenav").style.opacity = "1";
      document.getElementById("mySidenav").style.display = "block";
      document.getElementById("main").style.marginLeft = "150px";
      document.getElementById("open").style.display = "none";
      document.getElementById("close").style.display = "block";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.opacity = "0";
      // document.getElementById("mySidenav").style.display = "none";
      document.getElementById("main").style.marginLeft = "0";
      document.getElementById("close").style.display = "none";
      document.getElementById("open").style.display = "block";
    }
  </script>

</body>
<html>