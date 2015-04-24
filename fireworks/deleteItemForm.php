<?php
include("includes/header.php");

if ($_POST["delete_id_num"] === "")
{
  header("Location: index.php?message=delete_missing_id");
}

$sql = "SELECT * FROM Inventory WHERE id = ".$_POST["delete_id_num"];
$result = $conn->query($sql);

if ($result->num_rows === 0)
{
    header("Location: index.php?message=delete_no_row");
}

$row=($result->fetch_assoc());
?>


    <div><h2>Delete Item</h2></div>

    <div>
      <form method="post" action="deleteItemSubmit.php">
                                   <input class="id"  hidden  type="text" name="id"          value="<?php print $row["id"]?>"          />
        <label>SKU                 <input class="sku"         type="text" name="sku"         value="<?php print $row["sku"]?>"         /></label>
        <label>Description         <input class="description" type="text" name="description" value="<?php print $row["description"]?>" /></label>
        <label>Number on order     <input class="on_order"    type="text" name="on_order"    value="<?php print $row["onorder"]?>"     /></label>
        <label>Number in stock     <input class="in_stock"    type="text" name="in_stock"    value="<?php print $row["instock"]?>"     /></label>
        <label>Unit purchase cost  <input class="cost"        type="text" name="cost"        value="<?php print $row["cost"]?>"        /></label>
        <label>Unit sales price    <input class="price"       type="text" name="price"       value="<?php print $row["price"]?>"       /></label>

        <input type = "submit" value="Delete" />
      </form>

      <form method="post" action="index.php">
        <input type = "submit" value="Cancel" />

      </form>

    </div>

    <?php
    include("includes/footer.php");
    ?>
