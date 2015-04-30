<?php include('includes/header.php'); ?>

<div id="wrap">

  <?php
  if (isset($_GET['message'])){
    if ($_GET['message'] == "add_success"){
      print "<h1>Your user was added successfully</h1>";
    }
    if($_GET['message']== 'delete_success'){
      print "<h1>User number ".$_GET['id']. " has been deleted</h1>";
    }
  }
  ?>
  <table data-toggle="table" class="table">
    <thead>
      <td>id</td>
      <td>Name</td>
      <td>Address</td>
      <td>Phone</td>
    </thead>

<?php

  print "about to get users";

  $sql = "SELECT * FROM `users` ;";

  $result = $conn->query($sql)  or die(mysqli_error());

  $i = 0;


  while($row = $result->fetch_assoc()) {
    $i++;
    if($i> 1) {
      $i=0;
    }

    ?>
      <tr <?php if($i == 1) { print "class='even'"; }?>>
        <td><?php print $row['id']?></td>
        <td><?php print $row['name']?></td>
        <td><?php print $row['address']?></td>
        <td><?php print $row['phone']?></td>
        <td><a href="user_form.php?id=<?php print $row['id']?>">edit</a></td>
        <td><a href="delete_user.php?id=<?php print $row['id']?>">delete</a></td>
      </tr>

    <?php

  }



?>







  </table>



      <a href="user_form.php">Add a user!</a>


</div>
<style>
  #wrap { width: 500px; border: 3px dotted blue}

</style>


<?php include('includes/footer.php'); ?>


<style>
  .even { background: #ccccff; }
</style>
