<?php
include("includes/functions.php");

$dbh = db_connectp();
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


$stmt->execute() or die("there was an error!");

db_closep($dbh);

sendEMail("One item was added\r\n");

header("Location: index.php?message=add_success");
?>