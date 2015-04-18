<?php include('includes/header.php'); ?>

<id="wrap">

  <?php
  if (isset($_GET['message'])){
    if ($_GET['message'] == "add_success"){
      print "<h1>Your item was added successfully</h1>";
    }
  }
  ?>
  <table data-toggle="table" class="table">
    <thead>
      <td>ID</td>
      <td>SKU</td>
      <td>Description</td>
      <td>On Order</td>
      <td>In Stock</td>
      <td>Cost</td>
      <td>Total Cost</td>
      <td>Price</td>
      <td>Total Price</td>
    </thead>

<?php

  print "Loading";

  $sql = "SELECT * FROM `Inventory` ;";

  $result = $conn->query($sql);

  while($row = $result->fetch_assoc()) {
    ?>
      <tr>
        <td><?php print $row['id']?></td>
        <td><?php print $row['sku']?></td>
        <td><?php print $row['description']?></td>
        <td><?php print $row['onorder']?></td>
        <td><?php print $row['instock']?></td>
        <td><?php print $row['cost']?></td>
        <td><?php print $row['totalcost']?></td>
        <td><?php print $row['price']?></td>
        <td><?php print $row['totalprice']?></td>
      </tr>

    <?php

  }



?>







  </table>



      <form action="add_item_form.php" method="get">
        <input name="" type="submit" value="Add Item"/>
      </form>

<!--      <form action="add_user_form.php" method="get">-->
<!--        <button name="button add item name" value="Button Add Item Value">Button Add Item</button>-->
<!--      </form>-->


      <form name="form" action="" method="get")
        <a href="add_item_form.php">Edit User</a>
        <input type="text" id="edit" /></div>
        <div><a href="add_item_form.php">Delete User</a>
        <input type="text" id="delete" /></div>
      </form>

</div>
<style>
  #wrap { width: 500px; border: 3px dotted blue}

</style>


<?php include('includes/footer.php'); ?>
