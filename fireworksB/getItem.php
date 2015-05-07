<?php
include("includes/functions.php");

$dbh = pdoOpen();

$idNum = $_POST["itemID"];

$stmt = $dbh->prepare("SELECT * FROM Inventory WHERE id = ?");
$stmt->bindParam(1, $idNum);
$stmt->execute() or die("PDO Error");
$row = $stmt->fetch();

pdoClose($dbh);
print json_encode($row);