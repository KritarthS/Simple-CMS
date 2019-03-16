<?php


include("../functions/functions.php"); 

doSQL("DELETE FROM team WHERE id=\"{$_GET['teamID']}\"");

header("location: ../team.php?success=true&verb=deleted")

?>