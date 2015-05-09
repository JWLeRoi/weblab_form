var items = {};

function displayAddItemButton()
{
  var html = new EJS({url: "views/addItemButton.ejs"}).render("");
  $("#container03").html(html);
  $("#button01").on("click", function(event)
  {
    displayAddItemForm();

  });

}

function displayUpdateItemForm(itemID)
{
  var html = new EJS({url: "views/updateItemForm.ejs"}).render("");
  $("#container03").html(html);

  $.ajax(
  {
    type: "POST",
    url: "getItem.php",
    data: "itemID=" + itemID
  }).done(function (ajaxReturn)
  {
    items = JSON.parse(ajaxReturn);
    $("#id").val(items.id);
    $("#sku").val(items.sku);
    $("#description").val(items.description);
    $("#on_order").val(items.onorder);
    $("#in_stock").val(items.instock);
    $("#cost").val(items.cost);
    $("#price").val(items.price);
  });

  $("#updateItemInfo").on("submit", function (event)
  {
    event.preventDefault();
    event.stopPropagation();
    $.ajax(
    {
      type: "POST",
      url: "updateItem.php",
      data: $("#updateItemInfo").serialize()
    }).done(function(ajaxReturn)
    {
    });

    $("#updateItemInfo").trigger("reset");

    displayItems();

  });

  $("#button03").on("click", function (event)
  {
    displayAddItemButton();

  });

}

function displayAddItemForm()
{
  var html = new EJS({url: "views/addItemForm.ejs"}).render("");
  $("#container03").html(html);

  $("#addItemInfo").on("submit", function (event)
  {
    event.preventDefault();
    event.stopPropagation();
    $.ajax(
    {
      type: "POST",
      url: "addItem.php",
      data: $("#addItemInfo").serialize()
    }).done(function(ajaxReturn)
    {
    });

    $("#addItemInfo").trigger("reset");

    displayItems();

  });

  $("#button03").on("click", function (event)
  {
    displayAddItemButton();

  });

}

function displayMap(itemID)
{
  $.ajax(
  {
    type: "POST",
    url: "getItem.php",
    data: "itemID=" + itemID
  }).done(function (ajaxReturn)
  {
    items = JSON.parse(ajaxReturn);
    lat = items.latitude;
    lng = items.longitude;

    var mapCanvas = $("#container01");
    var mapButton = $("#button05");
    var latlng = new google.maps.LatLng(lat, lng);
    var mapOptions =
    {
      center: latlng,
      zoom: 14,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    mapCanvas.show();
    mapButton.show();

    var map = new google.maps.Map(mapCanvas[0], mapOptions);
    var marker = new google.maps.Marker(
    {
      position: latlng,
      map: map,
      title: items.name + "\n" + items.street + "\n" + items.city + ", " + items.state
    });

    mapButton.on("click", function()
    {
      mapCanvas.hide();
      mapButton.hide();

    });

  });

}

function displayDeleteItemForm(itemID)
{
  var html = new EJS({url: "views/deleteItemForm.ejs"}).render("");
  $("#container03").html(html);

  $.ajax(
  {
    type: "POST",
    url: "getItem.php",
    data: "itemID=" + itemID
  }).done(function (ajaxReturn)
  {
    items = JSON.parse(ajaxReturn);
    $("#id").val(items.id);
    $("#sku").val(items.sku);
    $("#description").val(items.description);
    $("#on_order").val(items.onorder);
    $("#in_stock").val(items.instock);
    $("#cost").val(items.cost);
    $("#price").val(items.price);
  });

  $("#deleteItemInfo").on("submit", function (event)
  {
    event.preventDefault();
    event.stopPropagation();
    $.ajax(
    {
      type: "POST",
      url: "deleteItem.php",
      data: $("#deleteItemInfo").serialize()
    }).done(function(ajaxReturn)
    {
    });

    //$("#updateItemInfo").trigger("reset");

    displayItems();
    displayAddItemButton();
  });

  $("#button03").on("click", function (event)
  {
    displayAddItemButton();
  });

}

function displayItems()
{
  var request = $.ajax
  ({
    url: "displayItems.php",
    context: document.body
  });

  request.done(function(ajaxReturn)
  {
    items = JSON.parse(ajaxReturn);
    var html = new EJS({url: "views/index.ejs"}).render(ajaxReturn);
  	$("#container02").html(html);
  });

  setTimeout(function()
  {
    $(".editItem").click(function(e)
    {
      displayUpdateItemForm($(this).attr("itemID"));
    });

    $(".deleteItem").click(function(e)
    {
      displayDeleteItemForm($(this).attr("itemID"));
    });

    $(".findStore").click(function(e)
    {
      displayMap($(this).attr("itemID"));
    });

  }, 500);

}

//setInterval(function(){ update_data(); }, 2000);

$(document).ready(function()
{
  displayItems();
  displayAddItemButton();
});
