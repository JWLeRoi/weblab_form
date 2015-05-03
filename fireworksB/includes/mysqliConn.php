<?php

function mysqliConnect(){

$servername = "localhost";
$username = "root";
$password = "weblab2015";
$db = "jwl01";

// Create connection
$conn = new mysqli($servername, $username, $password,  $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

return $conn;

}


function db_close($conn){

  mysqli_close($conn);

}
