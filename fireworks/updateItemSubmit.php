<?php
include("includes/functions.php");

$conn = db_connect();
$totalCost = total($_POST["in_stock"], $_POST["cost"]);
$totalPrice = total($_POST["in_stock"], $_POST["price"]);

$sql = "UPDATE Inventory SET sku = '" . $_POST["sku"] . "', description = '" . $_POST["description"] . "', onorder = '" . $_POST["on_order"] .
            "', instock = '" . $_POST["in_stock"] . "', cost = '" . $_POST["cost"] . "', totalcost = '" . $totalCost . "', price = '" . $_POST["price"] .
            "', totalprice = '" . $totalPrice . "' WHERE id = '" . $_POST["id"] . "'";

$conn->query($sql) or die("there was an error!");

header("Location: index.php?message=update_success id=" . $_POST["id"]);
?>