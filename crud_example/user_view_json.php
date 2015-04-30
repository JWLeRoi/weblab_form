<?php include('includes/db.php');

$conn = db_connect();

  if (isset($_GET['message'])){
    if ($_GET['message'] == "add_success"){
      print "<h1>Your user was added successfully</h1>";
    }
    if($_GET['message']== 'delete_success'){
      print "<h1>User number ".$_GET['id']. " has been deleted</h1>";
    }
  }


  $sql = "SELECT * FROM `users` WHERE id = ". $_GET['id']. " LIMIT 1;";

  $result = $conn->query($sql)  or die(mysqli_error());

  $user_array = [];

  $row = $result->fetch_assoc();




  print json_encode($row);
