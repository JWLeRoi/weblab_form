<?php
include('includes/functions.php');

$conn = mysqliConnect();

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

  $sql = "SELECT * FROM Inventory";

  $result = $conn->query($sql)  or die(mysqli_error());

  $user_array = [];

  while($row = $result->fetch_assoc())
  {
	$user_array[] = $row;
  }

  print json_encode($user_array);


