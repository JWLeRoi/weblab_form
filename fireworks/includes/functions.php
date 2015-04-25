<?php
function total($number, $value)
{
  return $number * $value;
}

function db_connectp()
{
  $servername = "localhost";
  $username = "jwl01";
  $password = "weblabjwl01";
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

function db_closep($dbh)
{
  $dbh->query('SELECT pg_terminate_backend(pg_backend_pid());');
  $dbh = null;
}
?>
