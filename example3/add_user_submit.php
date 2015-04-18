<?php


include('includes/db.php');
$conn = db_connect();

print_r($_POST);

$phone = $_POST['phone'];

$sql = "INSERT INTO users (name, address, phone)
VALUES ('".$_POST['name']."', '".$_POST['address']."', '$phone')";

print $sql . "<br/>";

$conn->query($sql) or die('there was an error!');


header("Location: index.php?message=add_success");
