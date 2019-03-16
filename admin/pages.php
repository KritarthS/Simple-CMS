<?php
include("partials/checkLoggedIn.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Pages</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> 
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="fillD">

<div class="wrapper col-12 col-s-12">
  

  <?php
    include("partials/navigation.php");
  ?> <!-- navigatyion -->

  <div class="logo col-6 col-s-6">
    <i class="fab fa-pied-piper"></i>
    <h1>Simple CMS</h1>
  </div> <!-- logo -->
  
  <article class="dashHead col-6 col-s-6">
    <h1>Here Are All Your Pages</h1>
    <p>What would you like to do?</p>
  </article>
  <section class="panel col-7 col-s-7"> <!-- editing panel -->
    <?php
    if (isset($_GET["success"]))
    {
      ?>
      <p class="msg success">We <?=ucfirst($_GET["verb"])?> Your Page Successfully !</p>
      <?php
    }?>
    
    <div class="action">
      <a href="pageForm.php" class="btn"><i class="fas fa-plus-circle"></i> Add A New Page</a>
    </div>

    <div class="recordRowHeader col-12 col-s-12"> <!-- panel headers -->
      <div class="recordCell name">Name</div>
      <div class="recordCell edit">Edit</div>
      <div class="recordCell delete">Delete</div>
    </div>

    
    <?php
    $arrPages =getRecords("SELECT * FROM pages");
    while($row = mysqli_fetch_assoc($arrPages))
    {
      echo "<div class=\"recordRow col-12 col-s-12\">
              <div class=\"recordCell name\">{$row["strName"]}</div>
              <div class=\"recordCell edit\"><a href=\"pageForm.php?pageID={$row["id"]}\"><i class=\"fas fa-pencil-alt\"></i></a></div>
              <div class=\"recordCell delete\"><a href=\"actions/deletePage.php?pageID={$row["id"]}\"><i class=\"fas fa-trash-alt\"></i></a></div>
            </div>";

    }
    ?> <!-- panel cells -->
  </section>  
</div>

</body>
</html>