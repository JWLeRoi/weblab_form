<?php
  include('includes/functions.php');

//$conn = mysqliConnect();

//  if (isset($_GET['message']))
//  {
//    if ($_GET['message'] == "add_success")
//    {
//      print "<h1>Your user was added successfully</h1>";
//    }
//
//    if($_GET['message']== 'delete_success')
//    {
//      print "<h1>User number ".$_GET['id']. " has been deleted</h1>";
//
//    }
//
//  }

  $error = "No Error";
//$errormessage = "";

  $dbh = pdoOpen();

  $stmt = $dbh->prepare("DELETE FROM Inventory WHERE id = ?");
  $stmt->bindParam(1, $_POST["id"]);

  $stmt->execute() or die($error = "PDO Error");

  pdoClose($dbh);

//sendEMail("One item was updated\r\n");

//if($error === 1)
//{
  print json_encode($stmt);
  print json_encode($error);




print json_encode($user_array);


