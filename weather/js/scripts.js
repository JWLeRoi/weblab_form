$(document).ready(function(){

  $("#go").click(function(){ getWeather(); });

});


function getWeather(){
  var url = "http://apidev.accuweather.com/locations/v1/search?q=" + encodeURIComponent($('#city').val())  + "&apikey=meSocYcloNe";

  console.log(url);
  $.ajax({
    url: url,
    context: document.body,

  })
  .done(function(data){




    console.log('got weather data');
    console.log(data);

    var url="http://apidev.accuweather.com/currentconditions/v1/"+ data[0].Key + ".json?language=en&apikey=meSocYcloNe"
    console.log(url);

    var cityState = data[0].EnglishName + ", " + data[0].AdministrativeArea.EnglishName;

    $.ajax({
      url: url,
      context: document.body
    })
    .done(function(weatherData){

        //console.log(weatherData);

        var temp = weatherData[0].Temperature.Imperial.Value;
        var weatherText = weatherData[0].WeatherText;

        $("#weatherInfo").html("<h2>The temperature in "+cityState+" is "+ temp +"</h2>" + "<h2>It's "+ weatherText +" </h2>");


    })

  })

}
