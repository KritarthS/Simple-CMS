<?php

include("../functions/functions.php"); 

$_POST["teamID"] = (isset($_POST["teamID"]))?$_POST["teamID"]:"";

$fileName = $_POST["old_strImage"];

if($_FILES["strImage"]["name"]!=""){

  $fileName = $_FILES['strImage']['name'];
  move_uploaded_file($_FILES['strImage']['tmp_name'], "../../assets/".$fileName);
}


if($_POST["teamID"]!="")
{

  doSQL("UPDATE team SET 
  
  strName=\"{$_POST["strName"]}\",
  strImage=\"{$fileName}\"
    WHERE 
    id=\"{$_POST["teamID"]}\""
    );
  $verb = "updated";

} else {

  
  doSQL("INSERT INTO team (
    strName, 
    strImage) 
      VALUES (\"{$_POST["strName"]}\",
      \"{$fileName}\")");
  $verb = "created";
 
}

 header("location: ../team.php?success=true&verb=$verb");


?>


