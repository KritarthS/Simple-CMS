<?php
include("partials/checkLoggedIn.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Team Form</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> 
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="fillD">

<div class="wrapper col-12 col-s-12">

  <?php
    include("partials/navigation.php");
  ?> <!-- navigation -->
    
  <article>
    <div class="logo col-6 col-s-6">
      <i class="fab fa-pied-piper"></i>
      <h1>Simple CMS</h1>
    </div> <!-- logo -->

    <?php
    $verb = "Adding";
    if(isset($_GET["teamID"])){
        
      $verb = "Editing";
      $arrTeam = getTeamMembers($_GET["teamID"]);

      if (!$arrTeam)
      {
        echo "hey... no team member with that ID";
        die;
      }
    }else{
      // not set
      $_GET["teamID"] = (isset($_GET['teamID']))?$_GET['teamID']:"";
      $arrTeam['strName']  = (isset($arrTeam['strName']))?$arrTeam['strName']:"";
      $arrTeam['strImage']  = (isset($arrTeam['strImage']))?$arrTeam['strImage']:"";
    
    }

    ?> <!-- verb setting -->
   
    <article class="dashHead col-9 col-s-9">
      <h1 id="addHead"><?=$verb?> A Team Member</h1> <!-- success message -->

      <form id="saveForm" method="post" action="actions/saveTeam.php" enctype="multipart/form-data">
        <input type="hidden" name="teamID" value="<?=$_GET["teamID"]?>">
        <input type="text" name="strName" value="<?=$arrTeam['strName']?>" placeholder="Enter Team Member Name"><br/>
        
        <!-- Profile Photo -->
        
        <img src="../assets/<?=$arrTeam['strImage']?>" width='200px' alt="">
        <input type="hidden" name="old_strImage" value="<?=$arrTeam['strImage']?>" placeholder="Profile Photo"><label>Profile Photo</label>
        <input type="file" name="strImage">


        <input id="saveP" type="submit" value="SAVE TEAM MEMBER">
      </form>
      
    </article>
    
  </article>
     
</div>

</body>
</html>