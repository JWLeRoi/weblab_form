<?php
include("includes/header.php");
?>

    <div>
      <h2>Inventory</h2>
    </div>

    <div>
      <?php
      if (isset($_GET["message"]))
      {
        $message = $_GET["message"];

        if ($message === "add_success")
        {
          echo "<script type= 'text/javascript'>";
          echo "alert('Added item')";
          echo "</script>";
        }

        if (strpos($message, "update_success")!== FALSE)
        {
          $message = "Updated item #" . substr($message, strpos($message, "=") + 1 );
          echo "<script type= 'text/javascript'>";
          echo "alert('$message')";
          echo "</script>";
        }

        if (strpos($message, "update_no_row")!== FALSE)
        {
          echo "<script type= 'text/javascript'>";
          echo "alert('Update failed! \\nItem not found!')";
          echo "</script>";
        }

        if (strpos($message, "delete_success")!== FALSE)
        {
          $message = "Deleted item #" . substr($message, strpos($message, "=") + 1 );
          echo "<script type= 'text/javascript'>";
          echo "alert('$message')";
          echo "</script>";
        }

        if (strpos($message, "delete_no_row")!== FALSE)
        {
          echo "<script type= 'text/javascript'>";
          echo "alert('Delete failed! \\nItem not found!')";
          echo "</script>";

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
        $stmt = $dbh->prepare("SELECT * FROM Inventory");
        $stmt->execute();

        while($row = $stmt->fetch())
        {
        ?>
          <tr>
            <td><?php print $row["id"]?></td>
            <td><?php print $row["sku"]?></td>
            <td><?php print $row["description"]?></td>
            <td><?php print $row["onorder"]?></td>
            <td><?php print $row["instock"]?></td>
            <td><?php print $row["cost"]?></td>
            <td><?php print $row["totalcost"]?></td>
            <td><?php print $row["price"]?></td>
            <td><?php print $row["totalprice"]?></td>
          </tr>

        <?php
        }
        ?>

      </table>

      <form action="addItemForm.php" method="post">
        <input type="submit" id="add_btn" name="add_btn" value="Add Item"/>
      </form>

      <form action="updateItemForm.php" method="post">
        <input type="submit" id="update_btn" name="update" value="Update Item"/>
        <label><input type="text" id="update_text" name="update_id_num" pattern="[0-9]{0,}[1-9]{1}" required/> <--Enter item number to update.</label>
      </form>

      <form action="deleteItemForm.php" method="post">
        <input type="submit" id="delete_btn" name="delete" value="Delete Item"/>
        <label><input type="text" id="delete_text" name="delete_id_num" pattern="[0-9]{0,}[1-9]{1}" required/> <--Enter item number to delete.</label>

      </form>

    </div>

<?php
include("includes/footer.php");
?>
