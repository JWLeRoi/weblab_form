<?php
include("includes/header.php");
?>






    <div><h2>Add item</h2></div>

    <div>
      <form method="post" action="addItemSubmit.php">

        <label>SKU                 <input class="sku"         type="text" name="sku"         placeholder="xx-xxxxx-xx"                 /></label>
        <label>Description         <input class="description" type="text" name="description"                                           /></label>
        <label>Number on order     <input class="on_order"    type="text" name="on_order"    placeholder="xxxx"                        /></label>
        <label>Number in stock     <input class="in_stock"    type="text" name="in_stock"    placeholder="xxxx"                        /></label>
        <label>Unit purchase cost  <input class="cost"        type="text" name="cost"        placeholder="xxx.xx"                      /></label>
        <label>Unit sales price    <input class="price"       type="text" name="price"       placeholder="xxx.xx"                      /></label>

        <input type = "submit" value="Add"    />
      </form>

      <form method="post" action="index.php">
        <input type = "submit" value="Cancel" />

      </form>

    </div>

    <?php
    include("includes/footer.php");
    ?>
