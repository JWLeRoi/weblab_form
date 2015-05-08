<?php
//include('includes/functions.php');

//  if (isset($_GET['message']))
//  {
//    if ($_GET['message'] == "add_success")
//    {
//      print "<h1>Your user was added successfully</h1>";
//    }

//    if($_GET['message']== 'delete_success')
//    {
//      print "<h1>User number ".$_GET['id']. " has been deleted</h1>";

//    }

//  }

include("includes/functions.php");

//error_reporting(0);
//ini_set("display_errors", 0);
$error = "No Error";
//$errormessage = "";

$dbh = pdoOpen();

$totalCost = total($_POST["in_stock"], $_POST["cost"]);
$totalPrice = total($_POST["in_stock"], $_POST["price"]);

$stmt = $dbh->prepare("INSERT INTO Inventory (sku, description, onorder, instock, cost, totalcost, price, totalprice) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bindParam(1, $_POST["sku"]);
$stmt->bindParam(2, $_POST["description"]);
$stmt->bindParam(3, $_POST["on_order"]);
$stmt->bindParam(4, $_POST["in_stock"]);
$stmt->bindParam(5, $_POST["cost"]);
$stmt->bindParam(6, $totalCost);
$stmt->bindParam(7, $_POST["price"]);
$stmt->bindParam(8, $totalPrice);

$stmt->execute() or die("PDO Error");

pdoClose($dbh);

//sendEMail("One item was added\r\n");

print json_encode($stmt);
print json_encode($error);

//if($error === 1)
//{
//  print JSON_encode($error);
//}
//else
//{
//  print 1;
//}