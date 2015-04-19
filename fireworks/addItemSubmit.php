<?php
include("includes/functions.php");

$conn = db_connect();
$totalCost = total($_POST["in_stock"], $_POST["cost"]);
$totalPrice = total($_POST["in_stock"], $_POST["price"]);

$sql = "INSERT INTO Inventory (sku, description, onorder, instock, cost, totalcost, price, totalprice)
        VALUES ('" . $_POST["sku"] . "', '" . $_POST["description"] . "', '" . $_POST["on_order"] . "', '" . $_POST["in_stock"] . "', '"
                   . $_POST["cost"] . "', '". $totalCost . "', '" . $_POST["price"] . "', '" . $totalPrice . "')";

$conn->query($sql) or die("there was an error!");

header("Location: index.php?message=add_success");
?>