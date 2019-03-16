<?php

include("../functions/functions.php"); 

$_POST["linkID"] = (isset($_POST["linkID"]))?$_POST["linkID"]:"";

if($_POST["linkID"]!="")
{

  doSQL("UPDATE links SET 
  
  strName=\"{$_POST["strName"]}\",
  nLocationsID=\"{$_POST["nLocationsID"]}\",
  nPagesID=\"{$_POST["nPagesID"]}\"
    WHERE 
    id=\"{$_POST["linkID"]}\""
    );
  $verb = "updated";

} else {

  
  doSQL("INSERT INTO links (
    strName, 
    nLocationsID, 
    nPagesID) 
      VALUES (\"{$_POST["strName"]}\",
      \"{$_POST["nLocationsID"]}\",
      \"{$_POST["nPagesID"]}\")");
  $verb = "created";
 
}

 header("location: ../links.php?success=true&verb=$verb");


?>