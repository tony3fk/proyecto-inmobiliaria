 

//coloca en la barra del layout geolocalización y temperatura

function geoFindMe() {
    
    var output = document.getElementById("temp");

    if (!navigator.geolocation.getCurrentPosition(position)) {
        output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
        return;
    }

   

    function success(position) {
        
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        var apiURL = "http://api.openweathermap.org/data/2.5/weather?lat=" + latitude + "&lon=" + longitude +
            "&appid=96edde9f7c64ae00b99322b16b678542";

        

        $.getJSON(apiURL, function(data) {
            //data is the JSON string
            //console.log(data);
            var celsius = data.main.temp - 273.15; //conversion de grados kelvin a celsius
            celsius = Math.round(celsius); //redondeo de la temperatura sin decimales
            output.innerHTML = '<p>' + data.name + ', ' + celsius + ' ºC</p>';
            
        });

        //var img = new Image();
        //img.src = "http://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";

        //output.appendChild(img);
    };

    function error() {
        output.innerHTML = "No se puede determinar localización.";
    };

     console.log(position);

    output.innerHTML = '<i class="fa fa-compass"></i>';

    navigator.geolocation.getCurrentPosition(success, error);
    }