<?php
include("partials/checkLoggedIn.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Globals Form</title>
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
    if(isset($_GET["globalsID"])){
        
      $verb = "Editing";
      $arrGlobals = getGlobals($_GET["globalsID"]);

      if (!$arrGlobals)
      {
        echo "hey... no value with that ID";
        die;
      }
    }else{
      // not set
      $_GET["globalsID"] = (isset($_GET['globalsID']))?$_GET['globalsID']:"";
      $arrGlobals['strName']  = (isset($arrGlobals['strName']))?$arrGlobals['strName']:"";
      $arrGlobals['strValue']  = (isset($arrGlobals['strValue']))?$arrGlobals['strValue']:"";
    }

    ?> <!-- conditional for setting verb -->


    <article class="dashHead col-9 col-s-9">
      <h1 id="addHead"><?=$verb?> A Global Variable</h1>

      <form id="saveForm" class="col-12 col-s-12" method="post" action="actions/saveGlobals.php">
        <input type="hidden" name="globalsID" value="<?=$_GET["globalsID"]?>">
        <input type="text" name="strName" value="<?=$arrGlobals['strName']?>" placeholder="Enter Global Variable Name"><br/>
        <input type="text" name="strValue" value="<?=$arrGlobals['strValue']?>" placeholder="Enter Global Variable Value"><br/>
        
        <input id="saveP" type="submit" value="SAVE GLOBAL VALUE">
      </form> <!-- globals form -->

    </article>
    
  </article>
     
</div>

</body>
</html>