var users = {};


function post_data(user){
  $.ajax({
    method: "POST",
    url: "user_submit_ajax.php",
    context: document.body,
    data: user
  }).done(function(data) {
    console.log(data);
    update_data();
  });

}




function update_data(){
  $.ajax({
    url: "index_json.php",
    context: document.body
  }).done(function(data) {
  	users = JSON.parse(data);


    users.forEach(function(e,i){

      if(isEven(i)){
        users[i].evenClass = "even";
      }
      else {

        users[i].evenClass = "";
      }
    });

    console.log(users);

    var html ="<div><table><tr><td>"+users[0].name+"</td></tr></table></div>"

  	//var html = new EJS({url: 'views/index_ajax.ejs'}).render(data);
  	$('#container').html(html);


   console.log('updated data!');
  });


}


update_data();

setInterval(function(){ update_data(); }, 2000);


$(document).ready(function(){
  $('#form_submit').click(function(e){
    var user = {
      name : $("#username").val(),
      address : $("#address").val(),
      phone : $("#phone").val()
    }

    post_data(user);

    console.log('form clicked');

  });
});


function isEven(n)
{
   return isNumber(n) && (n % 2 == 0);
}

function isOdd(n)
{
   return isNumber(n) && (Math.abs(n) % 2 == 1);
}


function isNumber(n)
{
   return n == parseFloat(n);
}
