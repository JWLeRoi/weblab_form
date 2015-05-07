<?php

function total($number, $value)
{
  return $number * $value;
}

function mysqliOpen()
{
  $servername = "localhost";
  $username = "root";
  $password = "weblab2015";
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


function mysqliClose($conn)
{
  mysqli_close($conn);
}

function pdoOpen()
{
  $servername = "localhost";
  $username = "jwl01";
  $password = "weblabjwl01";
//  $username = "root";
//  $password = "weblab2015";
  $db = "jwl01";

  try
  {
   $dbh = new PDO('mysql:host=localhost;dbname=jwl01', $username, $password);
  }
  catch (PDOException $e)
  {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
  }

  return $dbh;
}

function pdoClose($dbh)
{
  $dbh->query('SELECT pg_terminate_backend(pg_backend_pid());');
  $dbh = null;
}
