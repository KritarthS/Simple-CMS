<?php


include("../functions/functions.php"); 

doSQL("DELETE FROM pages WHERE id=\"{$_GET['pageID']}\"");

header("location: ../pages.php?success=true&verb=deleted")

?>