<?php
include("includes/functions.php");

$conn = db_connect();



$sql = "DELETE FROM Inventory WHERE id = '" . $_POST["id"] . "'";



$conn->query($sql) or die("there was an error!");

header("Location: index.php?message=delete_success id=" . $_POST["id"]);
?>