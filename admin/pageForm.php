<?php
include("partials/checkLoggedIn.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Page Form</title>
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
    if(isset($_GET["pageID"])){
        
      $verb = "Editing";
      $arrPage = getPage($_GET["pageID"]);

      if (!$arrPage)
      {
        echo "hey... no page with that ID";
        die;
      }
    }else{
      // not set
      $_GET["pageID"] = (isset($_GET['pageID']))?$_GET['pageID']:"";
      $arrPage['strName']  = (isset($arrPage['strName']))?$arrPage['strName']:"";
      $arrPage['strContent']  = (isset($arrPage['strContent']))?$arrPage['strContent']:"";
      $arrPage['strSubContent']  = (isset($arrPage['strSubContent']))?$arrPage['strSubContent']:"";
      $arrPage['strImage'] = (isset($arrPage['strImage']))?$arrPage['strImage']:"";
      $arrPage['strSubImage'] = (isset($arrPage['strSubImage']))?$arrPage['strSubImage']:"";
      $arrPage['strImageAlt'] = (isset($arrPage['strImageAlt']))?$arrPage['strImageAlt']:"";
    }
    ?> <!-- set verb -->

    <article class="dashHead col-9 col-s-9">
      <h1 id="addHead"><?=$verb?> A Page</h1> <!-- success message -->

      <form id="saveForm" method="post" action="actions/savePage.php" enctype="multipart/form-data"> <!-- form -->
        <input type="hidden" name="pageID" value="<?=$_GET["pageID"]?>">
        <input type="text" name="strName" value="<?=$arrPage['strName']?>" placeholder="Enter Page Name"><br/>
        <textarea name="strContent" placeholder="Enter Page Content"><?=$arrPage['strContent']?></textarea><br>
        <textarea name="strSubContent" placeholder="Enter Page Sub Content"><?=$arrPage['strSubContent']?></textarea><br>
        <select name="nTemplatesID">
            <option>Select Template</option>
              <?php
              
              $arrTemplates =getRecords("SELECT * FROM templates");
              while($row = mysqli_fetch_assoc($arrTemplates))
              {
                $isSelected = ($arrPage["nTemplatesID"] == $row["id"])?"SELECTED":"";
                echo "<option value=\"{$row["id"]}\" $isSelected >{$row["strName"]}</option>";

              }
              ?>
        </select>

        <!-- heroImage -->
        
        <img src="../assets/<?=$arrPage['strImage']?>" width='100px' alt="">
        <input type="hidden" name="old_strImage" value="<?=$arrPage['strImage']?>" placeholder="Hero Image"><label>Hero Image</label>
        <input type="file" name="strImage">

        <!-- subImage -->
        
        <img src="../assets/<?=$arrPage['strSubImage']?>" width='100px' alt="">
        <input type="hidden" name="old_strSubImage" value="<?=$arrPage['strSubImage']?>"><label>Sub Image</label>
        <input type="file" name="strSubImage">

        <!-- altImage -->
        <input type="text" name="strImageAlt" value="<?=$arrPage['strImageAlt']?>" placeholder="Sub Image Alt Tag"> 

        <input id="saveP" type="submit" value="SAVE PAGE">
      </form>

    </article>
    
  </article>
     
</div>

</body>
</html>