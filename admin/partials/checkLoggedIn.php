<?php

include("functions/functions.php");
session_start();

$results = mysqli_fetch_assoc(getRecords("SELECT * FROM users WHERE id=\"{$_SESSION["userID"]}\""));

if (!isset($results['id']))
{
  header("location: index.php?error=true");
}

?>