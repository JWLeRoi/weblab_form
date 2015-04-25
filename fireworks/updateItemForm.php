<?php
include("includes/header.php");

$idNum = $_POST["update_id_num"];

$stmt = $dbh->prepare("SELECT * FROM Inventory WHERE id = ?");
$stmt->bindParam(1, $idNum);
$stmt->execute() or die("there was an error!");
$row = $stmt->fetch();

if ($row["id"] === null)
{
    header("Location: index.php?message=update_no_row");
}
?>

    <div><h2>Update Item</h2></div>

    <div>
      <form method="post" action="updateItemSubmit.php">
                                   <input class="id"  hidden  type="text" name="id"          value="<?php print $row["id"]?>"          />
        <label>SKU                 <input class="sku"         type="text" name="sku"         value="<?php print $row["sku"]?>"
                                                                    pattern="[0-9]{2}[-][0-9]{5}[-][0-9]{2}" required                  /></label>
        <label>Description         <input class="description" type="text" name="description" value="<?php print $row["description"]?>"
                                                                                         pattern=".{1,50}"   required                  /></label>
        <label>Number on order     <input class="on_order"    type="number" min="0" max="9999"   step=1     name="on_order" value="<?php print $row["onorder"]?>"     /></label>
        <label>Number in stock     <input class="in_stock"    type="number" min="0" max="9999"   step=1     name="in_stock" value="<?php print $row["instock"]?>"     /></label>
        <label>Unit purchase cost  <input class="cost"        type="number" min="0" max="999.99" step=".01" name="cost"     value="<?php print $row["cost"]?>"        /></label>
        <label>Unit sales price    <input class="price"       type="number" min="0" max="999.99" step=".01" name="price"    value="<?php print $row["price"]?>"       /></label>

        <input type = "submit" value="Update"/>
      </form>

      <form method="post" action="index.php">
        <input type = "submit" value="Cancel" />

      </form>

    </div>
    
    <?php
    include("includes/footer.php");
    ?>