<?php
include('includes/functions.php');

  if (isset($_GET['message']))
  {
    if ($_GET['message'] == "add_success")
    {
      print "<h1>Your user was added successfully</h1>";
    }

    if($_GET['message']== 'delete_success')
    {
      print "<h1>User number ".$_GET['id']. " has been deleted</h1>";

    }

  }

  $dbh = pdoOpen();

  $sql = "SELECT * FROM Inventory";

  $result = $dbh->prepare($dbh);

  $result->execute() or die("PDO Error");

  pdoClose($dbh);

  $itemArray = [];

  while($row = $result->fetch())
  {
	$itemArray[] = $row;
  }

  print json_encode($itemArray);


