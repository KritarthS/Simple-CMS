<?php
include("partials/checkLoggedIn.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Link Form</title>
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
    </div>

    <?php
    $verb = "Adding";
    if(isset($_GET["linkID"])){
        
      $verb = "Editing";
      $arrLinks = getLinks($_GET["linkID"]);

      if (!$arrLinks)
      {
        echo "hey... no link with that ID";
        die;
      }
    }else{
      // not set
      $_GET["linkID"] = (isset($_GET['linkID']))?$_GET['linkID']:"";
      $arrLinks['strName']  = (isset($arrLinks['strName']))?$arrLinks['strName']:"";
      $arrLinks['nLocationsID']  = (isset($arrLinks['nLocationsID']))?$arrLinks['nLocationsID']:"";
      $arrLinks['nPagesID ']  = (isset($arrLinks['nPagesID ']))?$arrLinks['nPagesID ']:"";
    }

    ?><!-- conditional for setting verb -->

    <article class="dashHead col-9 col-s-9">
      <h1 id="addHead"><?=$verb?> A Link</h1>

      <form id="saveForm" method="post" action="actions/saveLink.php" enctype="multipart/form-data">
        <input type="hidden" name="linkID" value="<?=$_GET["linkID"]?>">
        <input type="text" name="strName" value="<?=$arrLinks['strName']?>" placeholder="Enter Link Name"><br/>
        
        <select name="nLocationsID">
            <option>Select Location</option>
              <?php
              
              $arrLocation =getRecords("SELECT * FROM locations");
              while($row = mysqli_fetch_assoc($arrLocation))
              {
                $isSelected = ($arrLinks["nLocationsID"] == $row["id"])?"SELECTED":"";
                echo "<option value=\"{$row["id"]}\" $isSelected >{$row["strName"]}</option>";

              }
              ?>
        </select>
        <select name="nPagesID">
            <option>Select Where Link Goes</option>
              <?php
              
              $arrPages =getRecords("SELECT * FROM pages");
              while($row = mysqli_fetch_assoc($arrPages))
              {
                $isSelected = ($arrLinks["nPagesID"] == $row["id"])?"SELECTED":"";
                echo "<option value=\"{$row["id"]}\" $isSelected >{$row["strName"]}</option>";

              }
              ?>
        </select>
        <input id="saveP" type="submit" value="SAVE LINK">
      </form> <!-- links form -->

    </article>
    
  </article>
     
</div>

</body>
</html>