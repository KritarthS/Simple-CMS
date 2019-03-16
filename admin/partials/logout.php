<?php
include("../functions/functions.php");
?>
<?php
session_start();
$_SESSION['userID'] = false;
header("location: ../index.php?error=true");
?>