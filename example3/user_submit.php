<?php


include('includes/db.php');
$conn = db_connect();

print_r($_POST);

$phone = $_POST['phone'];


if (isset($_POST['id'])){

  // editing

  //UPDATE table_name SET field1=new-value1, field2=new-value2 [WHERE Clause]
  $sql = "UPDATE users
  SET name = '".$_POST['name']."', address = '".$_POST['address']."', phone = '$phone'
  WHERE id=".$_POST['id'].";";


}
else {

  $sql = "INSERT INTO users (name, address, phone)
  VALUES ('".$_POST['name']."', '".$_POST['address']."', '$phone')";

  // adding

}


print $sql . "<br/>";

$conn->query($sql) or die('there was an error!');


header("Location: index.php?message=add_success");
