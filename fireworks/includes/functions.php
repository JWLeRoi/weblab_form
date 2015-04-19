<?php
function total($number, $value)
{
    return $number * $value;
}

function db_connect()
{
    $servername = "localhost";
    $username = "jwl01";
    $password = "weblabjwl01";
    $db = "jwl01";

    // Create connection
    $conn = new mysqli($servername, $username, $password,  $db);

    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;

}

function db_close($conn)
{
    mysqli_close($conn);
}
?>
