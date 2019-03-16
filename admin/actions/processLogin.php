<?php
include("../functions/functions.php"); 
session_start();
$results = mysqli_fetch_assoc(getRecords("SELECT * FROM users WHERE strEmail=\"{$_POST["strEmail"]}\" AND strPassword=\"{$_POST["strPassword"]}\""));
if (isset($results['id']))
{
  $_SESSION["userID"] = $results['id'];
  header("location: ../dashboard.php");
} else {
  header("location: ../index.php?error=true");
}
?>