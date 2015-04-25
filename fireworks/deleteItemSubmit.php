<?php
include("includes/functions.php");

$dbh = db_connectp();



$stmt = $dbh->prepare("DELETE FROM Inventory WHERE id = ?");


$stmt->bindParam(1, $_POST["id"]);









$stmt->execute() or die("there was an error!");

db_closep($dbh);

header("Location: index.php?message=delete_success id=" . $_POST["id"]);
?>