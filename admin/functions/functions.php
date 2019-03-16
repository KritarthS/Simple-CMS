<?php
function getPage($pageID){

  if (!$pageID)
  {
    echo "You didn't pass a page ID into the getPage function.
    Maybe your URL is not formed correctly, check the URL and edit where needed.";
  }

  $con = connect();
  $sql = "SELECT pages.*, templates.strFileLocation FROM pages LEFT JOIN templates ON templates.id=pages.nTemplatesID WHERE pages.id='{$pageID}'";
  // SELECT pages.* FROM pages LEFT JOIN templates ON templates.id=pages.nTemplatesID WHERE pages.id='$pageID'
  $arrPage = mysqli_fetch_assoc(mysqli_query($con, $sql));
  return $arrPage;
}

function connect()
{
  $con = mysqli_connect("192.185.103.167", "kritarth_bfk", "booksforkids", "kritarth_booksforkids" );
  return $con;
}


function getNavLinks($locationsID)
{
  $con = connect();
  $sql = "SELECT id, strName, nPagesID FROM links WHERE nLocationsID ='{$locationsID}'";
  $result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<li><a href=\"index.php?id={$row['nPagesID']}\">{$row['strName']}</a></li>";
  }
}

function getDataFromTable($table)
{
  $con = connect();
  $sql = "SELECT * FROM $table ";
  $result = mysqli_query($con,$sql);
  return $result;
}

function showDataGrid($table, $whichSnippet)
{
  
  $result = getDataFromTable($table);

  while($row = mysqli_fetch_assoc($result))
  {
    include("snippets/".$whichSnippet);
  };
}


function conDisplay($record, $field)
{
  if (isset($record[$field]))
  {
  echo $record[$field];
  } 
}

function getRecords($sql)
{
  $con = connect();
  $result = mysqli_query($con, $sql);
  return $result;
}

function getLinks($linksID)
{
  $con = connect();
  $sql = "SELECT * FROM links WHERE id= $linksID ";
  $arrLinks =  mysqli_fetch_assoc( mysqli_query($con, $sql));
  return $arrLinks;
}

function getGlobals($id)
{
  $con = connect();
  $result = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM globals WHERE id='".$id."'"));  
  return $result;
}

function doSQL($sql)
{
  $con = connect();
  mysqli_query($con, $sql);
}

function getTeamMembers($id)
{
  $con = connect();
  $sql = "SELECT * FROM team WHERE id='".$id."'";
  $arrTeam =  mysqli_fetch_assoc( mysqli_query($con, $sql));
  return $arrTeam;
}
?>