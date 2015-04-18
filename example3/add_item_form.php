<?php include('includes/header.php'); ?>


<form method="post" action="add_item_submit.php">
  <label>SKU<input type="text" name="sku" placeholder="xx-xxxxx-xx"/></label>
  <input type="text" name="description"/>
  <input type="text" name="on_order"/>
  <input type="text" name="in_stock"/>
  <input type="text" name="cost"/>
  <input type="text" name="total_cost"/>
  <input type="text" name="price"/>
  <input type="text" name="total_price"/>

  <input type = "submit" value="GO!" />
</form>


<?php include('includes/footer.php'); ?>
