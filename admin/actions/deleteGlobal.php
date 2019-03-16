<?php


include("../functions/functions.php"); 

doSQL("DELETE FROM globals WHERE id=\"{$_GET['globalsID']}\"");

header("location: ../globals.php?success=true&verb=deleted")

?>