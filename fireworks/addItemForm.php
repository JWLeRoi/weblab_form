<?php
include("includes/header.php");
?>

















    <div><h2>Add Item</h2></div>

    <div>
      <form method="post" action="addItemSubmit.php">

        <label>SKU                 <input class="sku"         type="text" name="sku"         placeholder="xx-xxxxx-xx"                 /></label>
        <label>Description         <input class="description" type="text" name="description"                                           /></label>
        <label>Number on order     <input class="on_order"    type="number" min="0" step="1" name="on_order"    placeholder="xxxx"     /></label>
        <label>Number in stock     <input class="in_stock"    type="number" min="0" step="1" name="in_stock"    placeholder="xxxx"     /></label>
        <label>Unit purchase cost  <input class="cost"        type="number" min="0" step=".01" name="cost"      placeholder="xxx.xx"   /></label>
        <label>Unit sales price    <input class="price"       type="number" min="0" step=".01" name="price"     placeholder="xxx.xx"   /></label>

        <input type = "submit" value="Add"    />
      </form>

      <form method="post" action="index.php">
        <input type = "submit" value="Cancel" />

      </form>

    </div>

    <?php
    include("includes/footer.php");
    ?>
