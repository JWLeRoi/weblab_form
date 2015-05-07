var items = {};
//var google_api_key = "AIzaSyCMwjkeseWVaKHym3Z0E6R1qV5FsMTYGFo";
//
//
//function view_user(userId){
//  $.ajax({
//      url: "user_view_json.php?id="+userId,
//      context: document.body
//    }
//  )
//  .done(function(data){
//    console.log(data);
//
//    data = JSON.parse(data);
//
//    var html = new EJS({url: 'views/user_view.ejs'}).render({userInfo: data});
//    $('#container').html(html);
//
//
//    var map;
//
//    google.maps.event.addDomListener(window, 'load', googleMaps_initialize);
//
//    $.ajax({
//      url: "https://maps.googleapis.com/maps/api/geocode/json?address="+encodeURIComponent(data.address),
//      context: document.body
//    })
//    .done(function(geoData){
//
//      console.log(geoData);
//
//      var thisLat = geoData.results[0].geometry.location.lat;
//      var thisLng = geoData.results[0].geometry.location.lng;
//
//
//      console.log(thisLat);
//      console.log(thisLng);
//      googleMaps_initialize(thisLat, thisLng);
//
//
//    });
//
//
//
//
//  });
//
//
//
//}
//
//
//function post_data(user){
//  $.ajax({
//    method: "POST",
//    url: "user_submit_ajax.php",
//    context: document.body,
//    data: user
//  }).done(function(data) {
//    console.log(data);
//    update_data();
//  });
//
//}

function displayAddItemButton()
{
  var html = new EJS({url: 'views/addItemButton.ejs'}).render("");
  $('#container02').html(html);
  $("#button01").on("click", function(event)
  {
    displayAddItemForm();

  });

}

function displayUpdateItemForm(itemID)
{
  var html = new EJS({url: 'views/updateItemForm.ejs'}).render("");
  $('#container02').html(html);
  alert(itemID);

  $.ajax(
  {
    type: "POST",
    url: "getItem.php",
    data: itemID,
    success: function (ajaxReturn)
    {
      alert(ajaxReturn);
    }
  }).done(function (ajaxReturn)
  {
  });

  $("#updateItemInfo").on("submit", function (event)
  {
    event.preventDefault();
    event.stopPropagation();
    $.ajax(
    {
      type: "POST",
      url: "updateItem.php",
      data: $("#updateItemInfo").serialize(),
      success: function(ajaxReturn)
      {
      }
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
  var html = new EJS({url: 'views/addItemForm.ejs'}).render("");
  $('#container02').html(html);

  $("#addItemInfo").on("submit", function (event)
  {
    event.preventDefault();
    event.stopPropagation();
    $.ajax(
    {
      type: "POST",
      url: "addItem.php",
      data: $("#addItemInfo").serialize(),
      success: function(ajaxReturn)
      {
      }
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

function removeForm()
{

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
    var html = new EJS({url: 'views/index.ejs'}).render(ajaxReturn);
  	$('#container01').html(html);
  });

  setTimeout(function()
  {
    $('.editItem').click(function(e)
    {
      alert("Edit " + $(this).attr('ITEMID'));
      displayUpdateItemForm($(this).attr('itemID'));

    });

    $('.deleteItem').click(function(e)
    {
      //alert("Delete " + $(this).attr('itemId'));
      view_user($(this).attr('userId'));
    });

    $('.findStore').click(function(e) {
      //alert("Find " + $(this).attr("itemId"));
      view_user($(this).attr("userId"));
    });

  }, 500);

}

//setInterval(function(){ update_data(); }, 2000);

$(document).ready(function()
{
  displayItems();
  displayAddItemButton();

});


//
//
//function isEven(n)
//{
//   return isNumber(n) && (n % 2 == 0);
//}
//
//function isOdd(n)
//{
//   return isNumber(n) && (Math.abs(n) % 2 == 1);
//}
//
//
//function isNumber(n)
//{
//   return n == parseFloat(n);
//}
//
//
//function googleMaps_initialize(lat, lng) {
//  var latlng = new google.maps.LatLng(lat, lng);
//
//  var mapOptions = {
//    zoom: 16,
//    center: latlng
//  };
//  map = new google.maps.Map(document.getElementById('map-canvas'),
//      mapOptions);
//
//
//
//
//  var marker = new google.maps.Marker({
//      position: latlng,
//      map: map,
//      title: 'Here!'
//  });
//}

//displayItems();
//displayAddItemButton();