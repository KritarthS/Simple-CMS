<?php

include("../functions/functions.php"); 

$_POST["pageID"] = (isset($_POST["pageID"]))?$_POST["pageID"]:"";

//saving the image
$fileName = $_POST["old_strImage"];

if($_FILES["strImage"]["name"]!=""){

  $fileName = $_FILES['strImage']['name'];
  move_uploaded_file($_FILES['strImage']['tmp_name'], "../../assets/".$fileName);
}

$strSubImage = $_POST["old_strSubImage"];

if($_FILES["strSubImage"]["name"]!=""){

  $strSubImage = $_FILES['strSubImage']['name'];
  move_uploaded_file($_FILES['strSubImage']['tmp_name'], "../../assets/".$strSubImage);
}

//

if($_POST["pageID"]!="")
{
  doSQL("UPDATE pages 
  SET strName=\"{$_POST["strName"]}\",
   strContent=\"{$_POST["strContent"]}\",
   strSubContent=\"{$_POST["strSubContent"]}\",
   strImage=\"{$fileName}\",
   strSubImage=\"{$strSubImage}\",
   strImageAlt=\"{$_POST["strImageAlt"]}\",
   nTemplatesID= \"{$_POST["nTemplatesID"]}\" 
   WHERE id=\"{$_POST["pageID"]}\"");

  $verb = "updated";
  
} else {
  
  doSQL("INSERT INTO pages (
    strName, 
    strContent, 
    strSubContent, 
    strImage, 
    strSubImage,
    strImageAlt, 
    nTemplatesID) 
                VALUES (\"{$_POST["strName"]}\",
                \"{$_POST["strContent"]}\",
                \"{$_POST["strSubContent"]}\",
                \"{$fileName}\",
                \"{$strSubImage}\",
                \"{$_POST["strImageAlt"]}\",
                \"{$_POST["nTemplatesID"]}\")");
  $verb = "created";
  
}



header("location: ../pages.php?success=true&verb=$verb");


?>

