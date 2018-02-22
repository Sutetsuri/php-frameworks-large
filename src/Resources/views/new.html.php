<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    #map {
      width: 100%;
      height: 400px;
      margin-top: 2%;

    }
    </style>
  </head>
  <body>
    <div class="form-meme">
      <form method="geo" action="/geo">
        <label>Your adress:</label>
        <input id="address" type="text" name="address" placeholder="Enter the address here">
        </br></br>
        <input type="submit" name="submitForm" value="Submit">
    </div>

    <p>Longitude: <span id="longField"><?php echo $latitude; ?></span></p>
    <p>Latitude: <span id="latField"><?php echo $longitude; ?></span></p>

    <div class="map-div">
      <div id="map"></div>
    </div>



    <script src="<?php echo $view['assets']->getUrl('public/location.js')?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWIl8pkTbpwT1_fZeftQNG4-Pe06RKbkc&callback=initMap" async defer></script>
  </body>
</html>
