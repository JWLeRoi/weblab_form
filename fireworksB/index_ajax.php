<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title></title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!--  <script src="ejs_0.9_alpha_1_production.js"></script>-->
  <script src="ejs_0.9_alpha_1_developer.js"></script>
<!--  <script src="ejs_1.0_production.js"></script>-->

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCMwjkeseWVaKHym3Z0E6R1qV5FsMTYGFo"></script>


</head>

<body>
  <script src="js/functions.js"></script>
  <div id="container"></div>

    <form method="post" action="addItemSubmit.php">
      <label>SKU                 <input id="sku"         type="text" name="sku"
                                      placeholder="xx-xxxxx-xx" pattern="[0-9]{2}[-][0-9]{5}[-][0-9]{2}" required/></label>
      <label>Description         <input id="description" type="text" name="description"
                                      placeholder="Enter a maximum of 50 characters" pattern=".{1,50}"   required/></label>
      <label>Number on order     <input id="on_order"    type="number" min="0" max="9999"   step="1"   name="on_order"
                                      placeholder="xxxx"                                                 required/></label>
      <label>Number in stock     <input id="in_stock"    type="number" min="0" max="9999"   step="1"   name="in_stock"
                                      placeholder="xxxx"                                                 required/></label>
      <label>Unit purchase cost  <input id="cost"        type="number" min="0" max="999.99" step=".01" name="cost"
                                      placeholder="xxx.xx"                                               required/></label>
      <label>Unit sales price    <input id="price"       type="number" min="0" max="999.99" step=".01" name="price"
                                      placeholder="xxx.xx"                                               required/></label>

      <input type = "submit" id="button01" value="Add" />
      <input type = "submit" id="button02" value="Edit Item"/>

    </form>

  <div id="buttons">
    <button id="button01">Add Item</button>
    <button id="button02">Edit Item</button>

  </div>

</body>

</html>
