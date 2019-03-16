<?php

include("../functions/functions.php"); 

$_POST["globalsID"] = (isset($_POST["globalsID"]))?$_POST["globalsID"]:"";

if($_POST["globalsID"]!="")
{

  doSQL("UPDATE globals 
  SET strName=\"{$_POST["strName"]}\",
  strValue=\"{$_POST["strValue"]}\"
    WHERE id=\"{$_POST["globalsID"]}\""
    );
  $verb = "updated";
} else {

  
  doSQL("INSERT INTO globals (strName, strValue) 
                VALUES (\"{$_POST["strName"]}\",
                \"{$_POST["strValue"]}\")");
  $verb = "created";
 
}

 header("location: ../globals.php?success=true&verb=$verb");


?>