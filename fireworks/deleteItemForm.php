<?php
include("includes/header.php");

$idNum = $_POST["delete_id_num"];

if ($idNum === "")
{
  header("Location: index.php?message=delete_missing_id");
}

$stmt = $dbh->prepare("SELECT * FROM Inventory WHERE id = ?");
$stmt->bindParam(1, $idNum);
$stmt->execute() or die("there was an error!");
$row = $stmt->fetch();

if (is_null($row))
{
    header("Location: index.php?message=delete_no_row");
}
?>

    <div><h2>Delete Item</h2></div>

    <div>
      <form method="post" action="deleteItemSubmit.php">
                                   <input class="id"  hidden  type="text" name="id"          value="<?php print $row["id"]?>"                  />
        <label>SKU                 <input class="sku"         type="text" name="sku"         value="<?php print $row["sku"]?>"         readonly/></label>
        <label>Description         <input class="description" type="text" name="description" value="<?php print $row["description"]?>" readonly/></label>
        <label>Number on order     <input class="on_order"    type="text" name="on_order"    value="<?php print $row["onorder"]?>"     readonly/></label>
        <label>Number in stock     <input class="in_stock"    type="text" name="in_stock"    value="<?php print $row["instock"]?>"     readonly/></label>
        <label>Unit purchase cost  <input class="cost"        type="text" name="cost"        value="<?php print $row["cost"]?>"        readonly/></label>
        <label>Unit sales price    <input class="price"       type="text" name="price"       value="<?php print $row["price"]?>"       readonly/></label>

        <input type = "submit" value="Delete"/>
      </form>

      <form method="post" action="index.php">
        <input type = "submit" value="Cancel" />

      </form>

    </div>

    <?php
    include("includes/footer.php");
    ?>
