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




function update_data()
{
  var request = $.ajax
  ({
    url: "index_json.php",
    context: document.body
  });

  request.done(function(ajaxReturn)
  {
  	//console.log(ajaxReturn);

    items = JSON.parse(ajaxReturn);

    //console.log(items);

    //items.forEach(function(item, index, items)
    //{
    //  items[index].id="";
    //  items[index].sku="";
    //  items[index].description="";
    //  items[index].onorder="";
    //  items[index].instock="";
    //  items[index].cost="";
    //  items[index].totalcost="";
    //  items[index].price="";
    //  items[index].totalprice="";
    //
    //});

    //console.log(items);

    //items.forEach(function(e,i){

      //if(isEven(i))
      //{
      //  items[i].evenClass = "even";
      //}
      //else {

        //items[i].evenClass = "";
      //}
    //});

    //console.log(items);

    //var html ="<div><table><tr><td>"+items[0].name+"</td></tr></table></div>"

    //var ejsObject = new EJS({url: 'views/index_ajax.ejs'});
    //console.log(ejsObject);
    var html = new EJS({url: 'views/index_ajax.ejs'}).render(ajaxReturn);
    //console.log(html);
  	$('#container').html(html);

    //$('.view_user_button').click(function(e)
    //{
    //    view_user($(this).attr('userId'));
    //});


   //console.log('updated data!');
  });


}


update_data();

//setInterval(function(){ update_data(); }, 2000);

//
//$(document).ready(function(){
//  $('#form_submit').click(function(e){
//    var user = {
//      name : $("#username").val(),
//      address : $("#address").val(),
//      phone : $("#phone").val()
//    }
//
//    post_data(user);
//
//    console.log('form clicked');
//
//  });
//});
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
