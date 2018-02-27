var map, infoWindow;
  var marker;
function initMap() {

  var latitude = Number(document.getElementById('latField').textContent);
  var longitude = Number(document.getElementById('lngField').textContent);
  var pos = new google.maps.LatLng(latitude,longitude);

  var myOptions = {
      zoom: 14,
      center: pos,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map"), myOptions);


  var geoText = "Latitude: " + latitude + " Longitude: " + longitude;


  var infoWindow = new google.maps.InfoWindow({
         content: geoText
       });

       // var marker = new google.maps.Marker({
       //   position: pos,
       //   animation: google.maps.Animation.DROP,
       //   map: map
       // });

       var icon = document.getElementById("iconChosen").value;
       chooseMarker(icon);

        marker.addListener('click', function() {
          infoWindow.open(map, marker);
        });

}

function chooseMarker(icon) {
  var latitude = Number(document.getElementById('latField').textContent);
  var longitude = Number(document.getElementById('lngField').textContent);
  var pos = new google.maps.LatLng(latitude,longitude);

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: pos
  });
  console.log(icon);
  if (icon == 1) {
    document.getElementById("colorChosen").disabled = true;
    marker = new google.maps.Marker({
      map: map,
      position: pos
    });
    console.log(marker);
  }else {
    var fillColor, strokeColor;
    document.getElementById("colorChosen").disabled = false;
    if (document.getElementById("colorChosen").value == "Gold") {
      fillColor = "#e5c100";
      strokeColor = "#e5c100";
    }
    else if (document.getElementById("colorChosen").value == "Purple") {
      fillColor = "#800080";
      strokeColor = "#800080";
    }
    marker = new google.maps.Marker({
      position: pos,
      map: map,
      icon: {
        path: 'M -1,0 A 1,1 0 0 0 -3,0 1,1 0 0 0 -1,0M 1,0 A 1,1 0 0 0 3,0 1,1 0 0 0 1,0M -3,3 Q 0,5 3,3',
        fillColor: fillColor,
        fillOpacity: 1,
        scale:8,
        strokeColor: strokeColor,
        strokeWeight: 2
      }
    });
  }
}
