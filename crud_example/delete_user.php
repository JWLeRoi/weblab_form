<?php

include('includes/db.php');
$conn = db_connect();

$sql = "DELETE FROM users WHERE id=".$_GET['id'].";";

print $sql;

$conn->query($sql) or die('there was an error!');

header("Location: index.php?message=delete_success&id=".$_GET['id']);
