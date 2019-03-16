<?php
include("partials/checkLoggedIn.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <style>
    
  </style>
</head>
<body class="fillD">

<div class="wrapper col-12 col-s-12">

  <?php
    include("partials/navigation.php");
  ?> <!-- navigation -->

  <div class="logo col-6 col-s-6">
    <i class="fab fa-pied-piper"></i>
    <h1>Simple CMS</h1>
  </div> <!-- logo -->


    
    <article class="dashHead col-7 col-s-7">
    
      <h1>Welcome Back!</h1>
      <p>What would you like to do?</p>
      
      <div class="dashLinks col-12 col-s-12">  <!-- links -->
        <a href="pages.php"><i class="fas fa-file-alt"></i>Pages</a>
        <a href="links.php"><i class="fas fa-link"></i>Links</a>
        <a href="globals.php"><i class="fas fa-globe-americas"></i>Global Values</a>
        <a href="team.php"><i class="fas fa-users"></i>Team Members</a>
      </div>
      
    </article>

</div>

</body>
</html>