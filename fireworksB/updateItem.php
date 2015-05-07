<?php
//include('includes/functions.php');
//
//$conn = mysqliConnect();
//
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

include("includes/functions.php");

//error_reporting(0);
//ini_set("display_errors", 0);
$error = "No Error";
//$errormessage = "";

$dbh = pdoOpen();

$totalCost = total($_POST["in_stock"], $_POST["cost"]);
$totalPrice = total($_POST["in_stock"], $_POST["price"]);

$stmt = $dbh->prepare("UPDATE Inventory SET sku = ? , description = ? , onorder = ? , instock = ? , cost = ? , totalcost = ?, price = ? , totalprice = ? WHERE id = ?");
//$stmt = $dbh->prepare("INSERT INTO Inventory (sku, description, onorder, instock, cost, totalcost, price, totalprice) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bindParam(1, $_POST["sku"]);
$stmt->bindParam(2, $_POST["description"]);
$stmt->bindParam(3, $_POST["on_order"]);
$stmt->bindParam(4, $_POST["in_stock"]);
$stmt->bindParam(5, $_POST["cost"]);
$stmt->bindParam(6, $totalCost);
$stmt->bindParam(7, $_POST["price"]);
$stmt->bindParam(8, $totalPrice);
$stmt->bindParam(9, $_POST["id"]);

$stmt->execute() or die($error = "PDO Error");

pdoClose($dbh);

//sendEMail("One item was updated\r\n");

//if($error === 1)
//{
  print json_encode($stmt);
  print json_encode($error);
//}
//else
//{
//  print JSON_encode($stmt);
//}