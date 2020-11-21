<?php
session_start();
if (!isset($_SESSION['username'])) {
     session_destroy();
     header("location:adminLogin.php");
}
?>


<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="adminDashboard.css">
</head>

<body>

     <?php
     include 'header_admin.html';
     ?>
     <?php
     include 'sidebar_admin.html';
     ?>

     <div class="content">
          <h2>Responsive Sidebar Example</h2>
          <p>This example use media queries to transform the sidebar to a top navigation bar when the screen size is 700px or less.</p>
          <p>We have also added a media query for screens that are 400px or less, which will vertically stack and center the navigation links.</p>
          <h3>Resize the browser window to see the effect.</h3>
     </div>
</body>

</html>